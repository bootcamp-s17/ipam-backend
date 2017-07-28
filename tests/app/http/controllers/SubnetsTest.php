<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;


use App\Subnet;


class SubnetsTest extends TestCase
{
use DatabaseTransactions;


    /**
     * A basic test example.
     *
     * @return void
     */
     //test to make sure route exists and returns JSON
    public function testSubnets (){
        $response = $this->get('/api/subnets');

        $response->assertStatus(200)->assertJson([]);
    }

    //test to make sure we can POST data via api to the database and confirm it exists after posting
    public function testStoreSubnets(){

        $response = $this->json('POST', '/api/subnets', [
             'name' => 'BL-Guest_Wiretesties',
             'site_id' => 1,
             'subnet_address' => '216.69.8.217',
             'mask_bits' => '24',
             'vLan' => '200'
         ]);

        $response = $this->get('/api/subnets');
      
        $response->assertJsonFragment([
            'name' => 'BL-Guest_Wiretesties',
         ]);

        $this->assertDatabaseHas('subnets', [
            'name' => 'BL-Guest_Wiretesties'
        ]);   
    }

    //test to make sure we can PUT data via api to the database and confirm it exists
    public function testPutSubnet(){
        $response = DB::table('subnets')->insertGetId([
             'name' => "BL-Guest_Sample",
             'site_id' => "1",
             'subnet_address' => "216.69.8.194",
             'mask_bits' => "24",
             'vLan' => "210"
        ]);

        $response = $this->post("/api/subnets/$response", [
            "_method" => "PUT",
            "id" => $response,
            'name'=> 'BL-Employee_Wires',
            'site_id' => "1",
            'subnet_address' => "216.69.8.194",
            'mask_bits' => "24",
            'vLan' => "210"
            ]);
        
        $this->assertDatabaseHas('subnets', [
            'name' => 'BL-Employee_Wires'
        ]); 

    }

     //test to make sure we are able to delete items
    public function testDeleteSubnet(){
        $response = DB::table('subnets')->insertGetId([
            'name' => "WirelessMgmt-2",
            'site_id' => "1",
            'subnet_address' => "10.34.189.90",
            'mask_bits' => "27",
            'vLan' => "700"
        ]);

        $this->json('DELETE',"/api/subnets/$response");

        $this->assertSoftDeleted('subnets', [
                'id' => $response,
            ]);
    }

}
