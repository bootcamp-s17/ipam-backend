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
        

        $sites = orderBy('name');

        // for each site add notes if there are any
        foreach ($sites as $site) {

            if (count($sites->find($site->id)->notes())){
             // getNotes lives in the Note model
             // in getNotes pass the model and the id   
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
        
        //Insert notes
        $site_id = $site->id;
        $note = new \App\Note(['text'=>$request->notes]);
        $site = \App\Site::find($site_id);
        $note = $site->notes()->save($note);
        return json($site);


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
        $sites['notes'] = Note::getNotes('App\Site', $sites->id);
        return response()->json($sites,200);
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
        $sites = \App\Site::find($request->id);
        $sites->fill($request->all())->save();

        $note = new \App\Note(['text'=>$request->notes]);
        $site = \App\Site::find($request->id);
        $note = $site->notes()->save($note);

        return json($sites);
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
        return json(null);
    }
}
