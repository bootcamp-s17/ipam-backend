<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Subnet;
use Illuminate\Http\Request;

class IpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ip_addresses = Equipment::all()->pluck('ip_address');

        return $ip_addresses;
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

    public function next($subnet_id)
    {
        //Use the index function declared on line 16
        //Within this function. 
        $ip_addresses = $this->index();

        //Creating array of subnets that are in use
        $inRange =array();

        //This loops through the ip addresses given by @index
        //and checks those that match the given subnet address 
        foreach ($ip_addresses as $ip_address){

            
            $ip_substr = substr($ip_address, 0, 9);


            if ($ip_substr === $this->get_subnet($subnet_id)){

                array_push($inRange, $ip_address);
            }
        }
        //creates next ip address available and returns it
        for ($i = 1; $i < 255; $i ++){

            $next = $this->get_subnet($subnet_id) . '.' . $i;

            if (!in_array($next, $inRange)){
                return $next;
            }
        }
    }

    public function check($subnet_id, $new_ip_address){
      

        //Creating array of subnets that are in use
        $inRange =array();

        //This loops through the ip addresses given by @index
        //and checks those that match the given subnet address 
        foreach ($this->get_addresses() as $address){
            
            $ip_substr = substr($address, 0, 9);


            if ($ip_substr === $this->get_subnet($subnet_id)){

                array_push($inRange, $address);
            }
        }
        if (!in_array($new_ip_address, $inRange)){
                return 'True';
            }
            else {
                return 'False';

            }
    }
    public function get_addresses(){
        // return $new_ip_address;

        //Use the index function declared on line 16
        //Within this function. 
        $ip_addresses = $this->index()->toArray();
        $subnets = Subnet::all()->pluck('subnet_address')->toArray();

        return array_merge($ip_addresses, $subnets);
    }

    public function get_subnet($subnet_id) {

        //Query the subnets table for the given id
        //This returns an array
        $subnet_specific = Subnet::find($subnet_id)->subnet_address;

        //Extracts first 3 number fields of subnet address
        //Pop removes the last element of the given array
        $subnet_array = explode('.', $subnet_specific);
        array_pop($subnet_array);

        //Implode takes the array and turns it back into a string.
       return implode('.', $subnet_array);
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
