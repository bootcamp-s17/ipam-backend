<?php

namespace App\Http\Controllers;

use App\Site;
use App\Note;
use Validator;
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
        
        $sites = Site::orderBy('name')->get();

        // for each site add notes if there are any
        foreach ($sites as $site) {

            if (count($sites->find($site->id)->notes())){
             // getNotes lives in the Note model
             // in getNotes pass the model and the id   
             $site['notes'] = Note::getNotes('App\Site', $site->id);
            }
        }

        return response()->json($sites,200);    
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
        // Store Site...
        $site = new Site;
        $site->fill($request->all())->save();
        //Insert notes
        if ($site->notes()) {
            $site_id = $site->id;
            $note = new \App\Note(['text'=>$request->notes]);
            $site = \App\Site::find($site_id);
            $note = $site->notes()->save($note);
        }
        return response()->json(array(
            "data" => $site,
            "message" => 'Successfully added.',
            "status" => 200,
            ));
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
        return response()->json($sites);
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

    public function update(Request $request){
        //https://laravel.com/docs/5.4/validation
        //validate incoming request
        $validator = $this->validates($request);
        // if there are any errors
        if ($validator->fails()) {
            // return the request and errors
            return array(
                    'data' => request()->all(),
                    'errors' => $validator->errors()->all(),
                );
        }

        $site = \App\Site::find($request->id);
        $site->fill($request->all())->save();
        if ($site->notes()) {
            $note = new \App\Note(['text'=>$request->notes]);
            $site = \App\Site::find($request->id);
            $note = $site->notes()->save($note);
        }


        return response()->json(array(
            "data" => $site,
            "message" => 'Successfully updated.',
            "status" => 200,
            ));

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

        return response()->json(array(
            "data" => $site,
            "message" => 'Deleted.',
            "status" => 204,
            ));
    }

    public function validates ($request){
        // https://laravel.com/docs/5.4/validation
        // validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|filled|string|max:40|unique:sites',
            'address' => 'required|filled|string|max:100',
            'abbreviation' => 'required|filled|string|max:6',
            'site_contact' => 'string|max:50',
            'notes' => 'string|max:250',
        ]);
        // return the valedator object
        return $validator;      
    }
}
