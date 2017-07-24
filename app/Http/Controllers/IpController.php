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

        $subnet_specific = Subnet::find($subnet_id)->subnet_address;
        $subnet_specific_array = explode('.', $subnet_specific);
        $subnet_specific_range = intval(array_pop($subnet_specific_array));
        // var_dump($subnet_specific_range);

        //creates next ip address available and returns it
        for ($i = $subnet_specific_range; $i <= ($subnet_specific_range + ($this->get_maskbit_range($subnet_id))); $i ++){

            //Creates an array that has the unavailable ip addresses for the given subnet id
            $unavailable = $this->in_subnet_range($subnet_id);
            // var_dump($unavailable);

            //Concats the next available ip address
            $next = $this->get_specific_subnet($subnet_id) . '.' . $i;
        
            if (!in_array($next,$unavailable)){
                return $next;
            }
        }
    }

    public function check($subnet_id, $new_ip_address){
        //Saving the value of the last digit
        $last_digit_array = explode('.', $new_ip_address);
        $last_digit = array_pop($last_digit_array);

        //Saving the value of the specific subnet
        $new_ip_subnet = substr($new_ip_address, 0, 9);
        // var_dump($new_ip_subnet);

        $blah = $this->in_subnet_range($subnet_id);
        var_dump($blah);

        $subnet_specific = Subnet::find($subnet_id)->subnet_address;
        $subnet_specific_array = explode('.', $subnet_specific);
        $subnet_specific_range = intval(array_pop($subnet_specific_array));

        if ($new_ip_subnet === $this->get_specific_subnet($subnet_id)){
            if (($last_digit > $subnet_specific_range) && ($last_digit <= ($subnet_specific_range + ($this->get_maskbit_range($subnet_id))))){
                if (!in_array($new_ip_address, $this->in_subnet_range($subnet_id))){
                    return 'True, the requested ip address is within the maskbit range, and is not currently in use';
                }
                else {
                    return 'False, the requested ip address is already in use';
                }
            }
            else {
                return 'False, the requested ip address is outside of the given maskbit range for the specified subnet address, the new ip address should end wit: ' . ;
            }
        }
        else {
            return 'False, the requested ip address is not within the specified subnet address, the new ip address should start with: ' . $this->get_specific_subnet($subnet_id);
        }
    }

    public function in_subnet_range($subnet_id){
        $inRange = array();

        foreach ($this->get_all_addresses() as $address){
            $ip_substr = substr($address, 0, 9);

            if ($ip_substr === $this->get_specific_subnet($subnet_id)){
                array_push($inRange, $address);
            }
        }

        // var_dump($inRange);
        return $inRange;    
   }
   


    public function get_all_addresses(){
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
        // var_dump($subnet_specific);

        // get 10.10.10 from 10.10.10.0 so everything from left of last period
        $full_address = substr($subnet_specific, 0 ,strrpos($subnet_specific, "."));

        // var_dump($full_address);
        return $full_address;
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
        return $range;
    }

    public function ips_in_subnet($subnet_id){

        //Returns all the ip addresses currently being used by the given subnet address
        $ips = Equipment::all()
            ->where('subnet_id', $subnet_id)
            ->pluck('ip_address')
            ->toArray();

        // var_dump($ips);
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
