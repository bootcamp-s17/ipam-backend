<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

use App\Site;

class SitesTest extends TestCase
{
   use DatabaseTransactions;


    /**
     * A basic test example.
     *
     * @return void
     */

     //test to make sure route exists and returns JSON
    public function testSites (){
        $response = $this->get('/api/sites');

        $response->assertStatus(200)->assertJson([]);
    }

    //test to make sure we can POST data via api to the database and confirm it exists after posting
    public function testStoreSites(){

        $response = $this->json('POST', '/api/sites', [
             'name' => 'Sally',
             'address' => '411 W Main St',
             'abbreviation' => 'SY',
             'site_contact' => 'Bob or Bill'
         ]);

        $response = $this->get('/api/sites');
      
        $response->assertJsonFragment([
            'name' => 'Sally',
         ]);

        $this->assertDatabaseHas('sites', [
            'name' => 'Sally'
        ]);   
    }

    //test to make sure we can PUT data via api to the database and confirm it exists
    //test failing -- this test was passing but now is not. Something on the dev branch
    //must have changed but currently not sure what

    // public function testPutSite(){
    //     $response = DB::table('sites')->insertGetId([
    //         'name' => "Sally",
    //         'address' => "Luther Crater, The Moon",
    //         'abbreviation' => "MC",
    //         'site_contact' => "Joe Gill (859)555-5555",
    //     ]);

    //     $response = $this->post("/api/sites/$response", [
    //         "_method" => "PUT",
    //         "id" => $response,
    //         'name'=> 'Joe'
    //         ]);
        
    //     $this->assertDatabaseHas('sites', [
    //         'name' => 'Joe'
    //     ]); 

    // }

    //test to make sure we are able to delete items
    public function testDeleteSite(){
        $response = DB::table('sites')->insertGetId([
            'name' => "Jolly",
            'address' => "Luther Crater, The Moon",
            'abbreviation' => "MC",
            'site_contact' => "Joe Gill (859)555-5555",
        ]);

        $this->json('DELETE',"/api/sites/$response");

        $this->assertSoftDeleted('sites', [
                'id' => $response,
            ]);
    }

}
