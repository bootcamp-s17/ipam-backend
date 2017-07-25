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
        return redirect()->route('test');
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
        $subnet->update($request->all());
        return response()->json($subnet,200);
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
