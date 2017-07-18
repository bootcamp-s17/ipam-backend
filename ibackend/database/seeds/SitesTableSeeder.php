<?php
use Illuminate\Database\Seeder;
class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
            'name' => "Moon Campus",
            'address' => "Luther Crater, The Moon",
            'abbreviation' => "MC",
            'site_contact' => "Joe Gill (859)555-5555",
        ]);
        DB::table('sites')->insert([
            'name' => "Awesome Inc",
            'address' => "555 Main St. Lexington KY, 40505",
            'abbreviation' => "AI",
            'site_contact' => "Joe Gill (859)555-5555",
        ]);
        DB::table('sites')->insert([
            'name' => "Dude Campus",
            'address' => "324 Ally St. Wilmore KY, 40390",
            'abbreviation' => "DC",
            'site_contact' => "Joe Gill (859)555-5555",
        ]);
        DB::table('sites')->insert([
            'name' => "Good Fellows",
            'address' => "311 Pizza St. Lexington KY, 40511",
            'abbreviation' => "GF",
            'site_contact' => "Joe Gill (859)555-5555",
        ]);
        DB::table('sites')->insert([
            'name' => "Jimmy Johns",
            'address' => "304 Main St. Lexington KY, 40939",
            'abbreviation' => "JJ",
            'site_contact' => "Joe Gill (859)555-5555",
        ]);
        DB::table('sites')->insert([
            'name' => "Apax Software",
            'address' => "555 Main St. Lexington KY, 40505",
            'abbreviation' => "AS",
            'site_contact' => "Joe Gill (859)555-5555",
        ]);
    }
}