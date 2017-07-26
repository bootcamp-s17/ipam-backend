<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;

class MacAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //returns validation information for the custom mac address the user want to use
    public function index($new_mac_address)
    {

        if (!in_array($new_mac_address, $this->get_all_mac_adds())){
            return response()->json([
                'boolean' => true,
                'error_message' => "the requested mac address is available for use at this time",
                ]);

        } else {
            $equipment_name = Equipment::all()
                ->where('mac_address', $new_mac_address)
                ->pluck('name')
                ->toArray();
            // var_dump($equipment_name[0]);

            $equipment_serial = Equipment::all()
                ->where('mac_address', $new_mac_address)
                ->pluck('serial_number')
                ->toArray();
            // var_dump($equipment_serial[0]);

            return response()->json([
                'boolean' => false,
                'error_message' => "the requested mac address is unavailable for use at this time because it lives in this network attached to the equipment with name: '$equipment_name[0]' and serial#: '$equipment_serial[0]'",
                ]);
        }

    }

    //returns all mac addresses currently in use
    public function get_all_mac_adds()
    {
        $mac_adds = Equipment::all()
            ->pluck('mac_address')
            ->toArray();
        // var_dump($mac_adds);

        return $mac_adds;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
