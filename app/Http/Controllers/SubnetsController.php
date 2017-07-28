<?php

namespace App\Http\Controllers;

use App\Subnet;
use App\Note;
use App\Equipment;
use Validator;

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
        $subnets = Subnet::orderBy('name')->get();
        
        foreach ($subnets as $subnet) {
            $subnet['site']= $subnet->site()->get();

            if (count($subnets->find($subnet->id)->notes())){
             // getNotes lives in the Note model
             // in getNotes pass the model and the id   
             $subnet['notes'] = Note::getNotes('App\Subnet', $subnet->id);
            }
            
        }

        return response()->json($subnets);
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

        $subnet = new Subnet;
        $subnet->fill($request->all())->save();

        //Insert notes

        if ($subnet->notes()) {
            $subnet_id = $subnet->id;
            $note = new \App\Note(['text'=>$request->notes]);
            $subnet = \App\Subnet::find($subnet_id);
            $note = $subnet->notes()->save($note);
        }
        return response()->json(array(
            "data" => $subnet,
            "message" => 'Successfully added.',
            "status" => 200,
            ));
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
        $subnets['notes'] = Note::getNotes('App\Subnet', $subnets->id);
        return response()->json($subnets);
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

        $subnet = \App\Subnet::find($request->id);
        $subnet->fill($request->all())->save();
        if ($subnet->notes()) {
        $note = new \App\Note(['text'=>$request->notes]);
        $subnet = \App\Subnet::find($request->id);
        $note = $subnet->notes()->save($note);
        }
        
        return response()->json(array(
            "data" => $subnet,
            "message" => 'Successfully updated.',
            "status" => 200,
            ));

        
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

        return response()->json(array(
            "data" => $subnets,
            'message' => 'Deleted.',
            'status' => 204,
            ));
    }

    public function validates ($request){
        // https://laravel.com/docs/5.4/validation
        // validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|filled|string|max:75|unique:sites',
            'site_id' => 'required|filled|integer|exists:sites,id',
            'subnet_address' => 'required|filled|ip',
            'mask_bits' => 'integer|min:1|max:32',
            'vLan' => 'integer',
            'lease_time' => 'integer',
            'notes' => 'string|max:250',
        ]);
        // return the valedator object
        return $validator;      
    }

    //returns all subnet addresses from subnets table
    public function get_all_subnet_addresses()
    {   
        $subnets = Subnet::all()->pluck('subnet_address')->toArray();
        // var_dump($subnets);
        return $subnets;
    }

    //returns the maskbit range 
    public function get_mask_bit_range($mask_bits)
    {   
        //Base maskbit number full range from 0-255 
        $base = 24;
        $increment = floor($mask_bits - $base);
        //as the maskbit number increases from 24 on, the range gets halfed upon each increment
        $range = intval(floor(255 / (pow(2,$increment))));
        // var_dump($range);
        return $range;
    }

    //returns validation to if the given subnet address complys with the given maskbit range
    public function check_mask_bit_range($mask_bits, $new_subnet_address)
    {
        //Saving the value of 4th slot of the given subnet address
        $last_digit_array = explode('.', $new_subnet_address);
        $last_digit = intval(array_pop($last_digit_array));
        // var_dump($last_digit); 


        if($last_digit > 0 && $last_digit <= $this->get_mask_bit_range($mask_bits)){
            return true;
        } else {
            return false;
        }
    }

    //checks to see if entered subnet address is in use
    //returns where the address is currently being used
    public function subnet_address_check($new_subnet_address)
    {
                //extracts the first three digit slots for comparision
        $new_get_first3_digits1 = explode('.', $new_subnet_address);
        $new_get_first3_digits2 = intval(array_pop($new_get_first3_digits1));
        $new_get_first3_digits3 = implode('.', $new_get_first3_digits1);
        // var_dump($new_get_first3_digits1);
        // var_dump($new_get_first3_digits2);
        // var_dump($new_get_first3_digits3);

        foreach($this->get_all_subnet_addresses() as $subnets){
            //extracts the first three digit slots for comparision
            $get_first3_digits1 = explode('.', $subnets);
            $get_first3_digits2 = intval(array_pop($get_first3_digits1));
            $get_first3_digits3 = implode('.', $get_first3_digits1);
            // var_dump($get_first3_digits1);
            // var_dump($get_first3_digits2);
            // var_dump($get_first3_digits3);
            

            if ($new_get_first3_digits3 === $get_first3_digits3){
                //re-concating the subnet address to find where it lives
                $subnet_match = $get_first3_digits3 . '.' . 0;
                // var_dump($subnet_match);

                //finding where the entered subnet address currently lives
                $used_subnet_address = Subnet::all()
                    ->where('subnet_address', $subnet_match)
                    ->pluck('name');

                return $used_subnet_address[0];
                // return response()->json([
                //     'boolean' => false,
                //     'error_message' => "the subnet address you are attempting to use is currently being used by the subnet with name: '$used_subnet_address'",
                //     ]);
            }
        }
    }

    //validates if the given subnet address is ok to use
    public function check($mask_bits, $new_subnet_address)
    {
        if ($this->subnet_address_check($new_subnet_address) != null){
            $used_subnet_name = $this->subnet_address_check($new_subnet_address);

            return response()->json([
                    'boolean' => false,
                    'error_message' => "the subnet address you are attempting to use is currently being used by the subnet with name: '$used_subnet_name'",
                    ]);
        } else {
            if ($this->check_mask_bit_range($mask_bits, $new_subnet_address) === true){
                return response()->json([
                    'boolean' => true,
                    'error_message' => 'none',
                    'error_number' => 0,
                ]);
            }
            else {
                $max = $this->get_mask_bit_range($mask_bits);

                return response()->json([
                    'boolean' => false,
                    'error_message' => "the 4th digit in the given new subnet address does not comply with the given mask bit range, this digit should be between 1 and $max",
                    'error_number' => 0,
                ]);
            }
        } 
        
    }




}















