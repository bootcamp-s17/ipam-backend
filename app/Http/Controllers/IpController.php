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

        //creates next ip address available and returns it
        for ($i = 1; $i < $this->get_maskbit_range($subnet_id); $i ++){

            //Creates an array that has the unavailable ip addresses
            $unavailable = array_merge($this->ips_in_subnet($subnet_id),$this->inRange($subnet_id));

            //Concats the next available ipaddress
            $next = $this->get_specific_subnet($subnet_id) . '.' . $i;
        
            if (!in_array($next,$unavailable)){
                return $next;
            }
            else {
                return "This ip address ($next) lives within this subnet. You should not use this";
            }
        }
    }

    public function check($subnet_id, $new_ip_address){
        $me = explode('.', $new_ip_address);
        
        if (array_pop($me) <= $this->get_maskbit_range($subnet_id)){
            if (!in_array($new_ip_address, $this->inRange($subnet_id))){
                
                return 'True, the new ip address entered is within the maskbit range, and not in use';
            }
            else {
                return 'False, the new ip address entered is within the maskbit range, but already in use';
            }

        } else{
            return 'False, the new ip address you are attempting to enter is outside of the dictated maskbit range. Sorry bro';
        }

        }

    public function inRange($subnet_id){
        $inRange = array();

        foreach ($this->get_addresses() as $address){
            $ip_substr = substr($address, 0, 9);

            if ($ip_substr === $this->get_specific_subnet($subnet_id)){
                array_push($inRange, $address);
            }
        }
        return $inRange;    
   }
   


    public function get_addresses(){
        // get all ip addresses from equipment 
        $ip_addresses = $this->index()->toArray();
        // get all subnet addresses from subnets
        $subnets = Subnet::all()->pluck('subnet_address')->toArray();
        // merge arrays together into one bank of ip addresses
        return array_merge($ip_addresses, $subnets);
        
    }

    public function get_specific_subnet($subnet_id) {
        //Query the subnets table for the given id
        $subnet_specific = Subnet::find($subnet_id)->subnet_address;
        // get 10.10.10 from 10.10.10.0 so everything from left of last period
        return substr($subnet_specific, 0 ,strrpos($subnet_specific, "."));
    }

    public function get_maskbit_range($subnet_id){
        //Returns the mask_bit value from the Subnets table
        $maskbit = Subnet::all()
            ->where('id', $subnet_id)
            ->pluck('mask_bits')
            ->first();
        //Base maskbit number full range from 0-255 
        $base = 24;
        $increment = floor($maskbit - $base);
        //maskbit range from 0-255 depending on maskbit difference from 24
        $range = floor(255 / (pow(2,$increment)));
        var_dump($range);
        return $range;
    }

    public function ips_in_subnet($subnet_id){

        $ips = Equipment::all()
            ->where('subnet_id', $subnet_id)
            ->pluck('ip_address')
            ->toArray();
        return $ips;
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
