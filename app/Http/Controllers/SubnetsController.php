<?php

namespace App\Http\Controllers;

use App\Subnet;
use App\Note;
use Validator;
use Illuminate\Http\Request;

class SubnetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subnets = Subnet::orderBy('name')->get();
        
        foreach ($subnets as $subnet) {
            $subnet['site']= $subnet->site()->get();

            if (count($subnets->find($subnet->id)->notes())){
             // getNotes lives in the Note model
             // in getNotes pass the model and the id   
             $subnet['notes'] = Note::getNotes('App\Subnet', $subnet->id);
            }
            
        }

        return response()->json($subnets);
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

        $subnet = new Subnet;
        $subnet->fill($request->all())->save();

        //Insert notes

        if ($request->notes()) {
            $subnet_id = $subnet->id;
            $note = new \App\Note(['text'=>$request->notes]);
            $subnet = \App\Subnet::find($subnet_id);
            $note = $subnet->notes()->save($note);
        }
        return response()->json(array(
            "data" => $subnet,
            "message" => 'Successfully added.',
            "status" => 200,
            ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subnets  $subnets
     * @return \Illuminate\Http\Response
     */
    public function show(Subnet $subnets)
    {
        $subnets['site'] = $subnets->site()->get();
        $subnets['notes'] = Note::getNotes('App\Subnet', $subnets->id);
        return response()->json($subnets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subnets  $subnets
     * @return \Illuminate\Http\Response
     */
    public function edit(Subnet $subnets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subnets  $subnets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subnet $subnets)
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

        $subnets = \App\Subnet::find($request->id);
        $subnets->fill($request->all())->save();
        if ($request->notes()) {
        $note = new \App\Note(['text'=>$request->notes]);
        $subnet = \App\Subnet::find($request->id);
        $note = $subnet->notes()->save($note);

        
        return response()->json(array(
            "data" => $subnet,
            "message" => 'Successfully updated.',
            "status" => 200,
            ));

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subnets  $subnets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subnet $subnets)
    {
        $subnets->delete();

        return response()->json(array(
            "data" => $subnets,
            'message' => 'Deleted.',
            'status' => 204,
            ));
    }

    public function validates ($request){
        // https://laravel.com/docs/5.4/validation
        // validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|filled|string|max:75|unique:sites',
            'site_id' => 'required|filled|integer|exists:sites,id',
            'subnet_address' => 'required|filled|ip',
            'mask_bits' => 'integer|min:1|max:32',
            'vLan' => 'integer',
            'lease_time' => 'integer'
            'notes' => 'string|max:250',
        ]);
        // return the valedator object
        return $validator;      
    }
}
