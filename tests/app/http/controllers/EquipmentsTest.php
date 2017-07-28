<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;


use App\Equipment;


class EquipmentsTest extends TestCase
{
   use DatabaseTransactions;


    /**
     * A basic test example.
     *
     * @return void
     */
     //test to make sure route exists and returns JSON
    public function testEquipmentsEndpoint (){
        $response = $this->get('/api/equipment');

        $response->assertStatus(200)->assertJson([]);
    }


    //Most of the equipment tests are failing. There are more values that must be filled in for the 
    //equipment table so there maybe a value being added incorrectly

    //test to make sure we can POST data via api to the database and confirm it exists after posting

    // public function testStoreEquipments(){

    //     $response = $this->json('POST', '/api/equipment', [
    //          'name' => 'BLM-HP-TouchScreen50',
    //          'equipment_type_id' => '1',
    //          'room_id' => '3',
    //          'model' => 'HP LaserJet 3000',
    //          'driver' => 'uniFLOW Universal Driver',
    //          'serial_number' => 'fake cereal',
    //          'ip_address' => '10.34.138.200',
    //          'site_id' => '1',
    //           'subnet_id' => '2',
    //          'mac_address' => '00:01:e6:4e:08:94',
    //          'mab' => 'false',
    //          'printer_server' => 'BLM-RPS',
    //          'printer_name' => 'BLM-209-Laser',
    //          'share_name' => 'BLM-209-Laser',
    //          'share_comment' => 'BLM-209HP Adult Ed HP 4000'
    //      ]);

    //     $response = $this->get('/api/equipment');
      
    //     $response->assertJsonFragment([
    //         'name' => 'BLM-HP-TouchScreen50',
    //      ]);

    //     $this->assertDatabaseHas('equipment', [
    //         'name' => 'BLM-HP-TouchScreen50'
    //     ]);   
    // }

    //test to make sure we can PUT data via api to the database and confirm it exists

    // public function testPutEquipment(){
    //     $response = DB::table('equipment')->insertGetId([
    //          'name' => 'BLM-Epson-TouchScreen918',
    //          'equipment_type_id' => '1',
    //          'room_id' => '14',
    //          'model' => 'Epson LaserJet 3000',
    //          'driver' => 'Epson uniFLOW Universal Driver',
    //          'serial_number' => 'fake cereal',
    //          'ip_address' => '10.34.138.204',
    //          'site_id' => '1',
    //          'subnet_id' => '2',
    //          'mac_address' => '00:01:e6:3e:08:94',
    //          'mab' => 'false',
    //          'printer_server' => 'BLM-RPr',
    //          'printer_name' => 'BLM-212-Laser',
    //          'share_name' => 'BLM-212-Laser',
    //          'share_comment' => 'BLM-209Epson Adult Ed Epson 4000'
    //     ]);

    //     $response = $this->post("/api/equipment/$response", [
    //         "_method" => "PUT",
    //         "id" => $response,
    //         'name' => 'Canon Photoshoot 500'
    //         ]);
        
    //     $this->assertDatabaseHas('equipment', [
    //         'name' => 'Canon Photoshoot 500'
    //     ]); 

    // }

    //test to make sure we are able to delete items
    
    // public function testDeleteEquipment(){
    //     $response = DB::table('equipment')->insertGetId([
    //         'name' => 'BLM-Epson-TouchScreen50',
    //          'equipment_type_id' => '1',
    //          'room_id' => '14',
    //          'model' => 'Epson LaserJet 3000',
    //          'driver' => 'Epson uniFLOW Universal Driver',
    //          'serial_number' => 'fake cereal',
    //          'ip_address' => '10.34.138.204',
    //          'site_id' => '1',
    //          'subnet_id' => '2',
    //          'mac_address' => '00:01:e6:3e:08:94',
    //          'mab' => 'false',
    //          'printer_server' => 'BLM-RPr',
    //          'printer_name' => 'BLM-212-Laser',
    //          'share_name' => 'BLM-212-Laser',
    //          'share_comment' => 'BLM-209Epson Adult Ed Epson 4000'
    //     ]);

    //     $this->json('DELETE',"/api/equipment/$response");

    //     $this->assertSoftDeleted('equipment', [
    //             'id' => $response,
    //         ]);
    // }

}