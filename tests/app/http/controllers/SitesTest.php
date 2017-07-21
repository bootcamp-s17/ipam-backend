<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SitesTest extends TestCase
{
   use DatabaseTransactions;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

    $response = $this->json('POST', '/api/sites', [
         'name' => 'Sally',
         'address' => '411 W Main St',
         'abbreviation' => 'SY',
         'site_contact' => 'Bob or Bill'
         ]);

      $response = $this->get('/api/sites');
      $response->assertStatus(200)
               ->assertJsonFragment([
            'name' => 'Sally',
         ]);
    }
}
