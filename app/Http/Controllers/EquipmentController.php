<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Note;
use Validator;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::orderBy('name')->get();

        foreach ($equipments as $equipment) {
            $equipment['site'] = $equipment->site()->get();
            $equipment['subnet'] = $equipment->subnets()->get();
            $equipment['type'] = $equipment->equipment_type()->get();

            if (count($equipments->find($equipment->id)->notes())){
             // getNotes lives in the Note model
             // in getNotes pass the model and the id   
             $equipment['notes'] = Note::getNotes('App\Equipment', $equipment->id);
            }

        }

        return response()->json($equipments,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         // validate incoming request
        $validator = $this->validates($request);
        // if there are any errors
        if ($validator->fails()) {
            // return the request and errors
            return array(
                    'data' => request()->all(),
                    'errors' => $validator->errors()->all(),
                );
        }

        $equip = new Equipment;
        $equip->fill($request->all())->save();

        //Insert notes
        if ($equip->notes()) {
            $equip_id = $equip->id;
            $note = new \App\Note(['text'=>$request->notes]);
            $equip = \App\Equip::find($equip_id);
            $note = $equip->notes()->save($note);
        }   

        return response()->json(array(
            "data" => $equip,
            "message" => 'Successfully updated.',
            "status" => 200,
            ));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        $equipment['type'] = $equipment->equipment_type()->get();
        $equipment['site'] = $equipment->site()->get();
        $equipment['notes'] = Note::getNotes('App\Equipment', $equipment->id);
        return response()->json($equipment,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $validator = $this->validates($request);
        // if there are any errors
        if ($validator->fails()) {
            // return the request and errors
            return array(
                    'data' => request()->all(),
                    'errors' => $validator->errors()->all(),
                );
        }

        $equip = new \App\Equipment;
        $equip->fill($request->all())->save();

        $equip = new \App\Equipment;
        $equip->fill($request->all())->save();
        if ($equip->notes()) {
            $note = new \App\Note(['text'=>$request->notes]);
            $equip = \App\Equip::find($request->id);
            $note = $equip->notes()->save($note);
        }
         return response()->json(array(
            "data" => $equip,
            "message" => 'Successfully updated.',
            "status" => 200,
            ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equip = \App\Equipment::find($equipment->id);
        $equip->delete();
        return response()->json(array(
            "data" => $equip,
            "message" => 'Successfully updated.',
            "status" => 204,
            ));
    }

    public function validates ($request){
        // https://laravel.com/docs/5.4/validation
        // validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|filled|string',
            'equipment_type_id' => 'integer|exists:equipment_types,id',
            'room_id' => 'required|integer|exists:rooms,id',
            'ip_address' => 'required|ip|unique:subnets,subnet_address|unique:equipments,ip_address|filled',
            'site_id' => 'required|filled|integer|exists:sites,id',
            'subnet_id' => 'required|filled|integer|exists:subnets,id',
            'host_name' => 'string|max:50',
            'port_number' => 'integer',
            'mac_address' => 'required_unless:equipment_type_id,9|unique:equipments,mac_address',
            'mab' => 'required|boolean',
            //switch specific equiment type must be 10
            'switch_man_ip' => 'required_if:equipment_type_id,10|ip',
            // end switch specific
            //computer specific
            'os_version' => 'required_if:equipment_type_id,2|string',
            'physical' => 'required_if:equipment_type_id,2|boolean',
            // end computer specific
            // printer specific
            // printer has to be id 1 in equipment types table
            'model' => 'required_if:equipment_type_id,1|string',
            'driver' => 'required_if:equipment_type_id,1|string',
            'printer_server' => 'required_if:equipment_type_id,1|string',
            'printer_name' => 'required_if:equipment_type_id,1|string',
            'share_name' => 'required_if:equipment_type_id,1|string',
            'share_comment' => 'required_if:equipment_type_id,1|string',
            // end printer specific
            'notes' => 'string|max:250',
        ]);
        // return the valedator object
        return $validator;      
    }
}
