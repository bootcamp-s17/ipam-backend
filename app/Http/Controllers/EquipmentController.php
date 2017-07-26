<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Note;
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

        return $equipments;
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
        $equip = new \App\Equipment;
        $equip->fill($request->all())->save();

        //Insert notes
        if ($request->notes()) {
            $equip_id = $equip->id;
            $note = new \App\Note(['text'=>$request->notes]);
            $equip = \App\Equip::find($equip_id);
            $note = $equip->notes()->save($note);
    }   
        return $equip;
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
        return $equipment;
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
        $equip = new \App\Equipment;
        $equip->fill($request->all())->save();
        if ($request->notes()) {
            $note = new \App\Note(['text'=>$request->notes]);
            $equip = \App\Equip::find($request->id);
            $note = $equip->notes()->save($note);
        }
        return $equip;
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
        return $equip;
    }
}
