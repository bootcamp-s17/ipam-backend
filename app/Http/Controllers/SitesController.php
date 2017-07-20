<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sites = \App\Site::all(); 
        // foreach($sites as $site){
            
        //     $subnets = $site->subnets()->get();
            
        //     $site['subnets'] = $subnets;
        // }
        return $sites;    
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
        // $site = \App\Site::create($request->all());
        $site = new \App\Site;
        $site->name = $request->input('name');
        $site->address = $request->input('address');
        $site->abbreviation = $request->input('abbreviation');
        $site->site_contact = $request->input('site_contact');
        $site->save();


        return response()->json($site,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function show(Site $sites)
    {
        // foreach($sites as $site){
        //     dd($site->subnets()->get());
        //     $subnets = $site->subnets()->get();
        //     dd($subnets);
        //     $site['subnets'] = $subnets;
        // }
        $subnets = $sites->subnets()->get();
        // dd($subnets);
        $sites['subnets'] = $subnets;
        return $sites;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function edit(Sites $sites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sites $sites)
    {
        $site->update($request->all());
        return response()->json($site,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sites $sites)
    {
        $sites->delete();

        return response()->json(null,204);
    }
}
