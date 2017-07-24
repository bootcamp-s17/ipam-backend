<?php

namespace App\Http\Controllers;

use App\Site;
use App\Note;
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
        // $ids = Site::all()->pluck('id');
        // $notes = array();
        foreach ($sites as $site) {
            if (Note::getNotes('App\Site', $site->id)){
             $site['notes'] = Note::getNotes('App\Site', $site->id);
            }
        }
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
        $site->fill($request->all())->save();
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
        $subnets = $sites->subnets()->get();
        $sites['subnets'] = $subnets;
        return Route('test');
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
        $site->fill($request->all())->save();
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
