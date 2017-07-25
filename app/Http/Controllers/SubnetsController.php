<?php

namespace App\Http\Controllers;

use App\Subnet;
use App\Note;
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
        $subnets = \App\Subnet::all();
        
        foreach ($subnets as $subnet) {
            $subnet['site']= $subnet->site()->get();

            if (count($subnets->find($subnet->id)->notes())){
             // getNotes lives in the Note model
             // in getNotes pass the model and the id   
             $subnet['notes'] = Note::getNotes('App\Subnet', $subnet->id);
            }
            
        }

        return $subnets;
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
        $subnet = new \App\Subnet;
        $subnet->fill($request->all())->save();

        //Insert notes
        $subnet_id = $subnet->id;
        $note = new \App\Note(['text'=>$request->notes]);
        $subnet = \App\Subnet::find($subnet_id);
        $note = $subnet->notes()->save($note);

        return json($subnet);
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
        return $subnets;
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
        $subnets = \App\Subnet::find($request->id);
        $subnets->fill($request->all())->save();
        $note = new \App\Note(['text'=>$request->notes]);
        $subnet = \App\Subnet::find($request->id);
        $note = $subnet->notes()->save($note);
        
        return response()->json($subnets,200);
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

        return response()->json(null,204);
    }
}
