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
        $site = new \App\Site;
        $site->name = $request->input('name');
        $site->address = $request->input('address');
        $site->abbreviation = $request->input('abbreviation');
        $site->site_contact = $request->input('site_contact');
        $site->save();


        return redirect()->route('test');
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
        return Route('test');
        // return $sites;
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
    public function update(Request $request, Site $sites)
    {
        $site = \App\Site::find($request->id);
        $data = array("name" =>$request->name,
            "address"=> $request->address,
            "abbreviation" =>$request->abbreviation,
            "site_contact" => $request->site_contact);
        $site->fill($data);
        $site->save();
        return redirect()->route('test');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $sites)
    {
        $site = \App\Site::find($sites->id);
        $site->delete();
        return redirect()->route('test');
    }
}
