<?php

use Illuminate\Database\Seeder;

class SubnetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subnets')->insert([
            'name' => "BL-Employee-Wired",
            'site_id' => 1,
            'subnet_address' => '10.34.138.0',
            'mask_bits' => 24,
            'vLan' => 200,
        ]);

        DB::table('subnets')->insert([
            'name' => "BL-Classroom-Wired",
            'site_id' => 1,
            'subnet_address' => '10.34.139.0',
            'mask_bits' => 25,
            'vLan' => 300,
        ]);

        DB::table('subnets')->insert([
            'name' => "BL-Server-Wired",
            'site_id' => 1,
            'subnet_address' => '10.34.140.0',
            'mask_bits' => 25,
            'vLan' => 220,
        ]);

        DB::table('subnets')->insert([
            'name' => "BL-Guest-Auth_Fail",
            'site_id' => 1,
            'subnet_address' => '10.34.140.128',
            'mask_bits' => 25,
            'vLan' => 300,
        ]);

        DB::table('subnets')->insert([
            'name' => "BL-Guest_Wireless",
            'site_id' => 1,
            'subnet_address' => '10.34.183.0',
            'mask_bits' => 24,
            'vLan' => 310,
        ]);

        DB::table('subnets')->insert([
            'name' => "BL-Employee_Wireless",
            'site_id' => 1,
            'subnet_address' => '10.34.184.0',
            'mask_bits' => 24,
            'vLan' => 210,
        ]);

        DB::table('subnets')->insert([
            'name' => "WirelessMgmt",
            'site_id' => 1,
            'subnet_address' => '10.34.189.96',
            'mask_bits' => 27,
            'vLan' => 700,
        ]);

        DB::table('subnets')->insert([
            'name' => "BL-Public-Wired",
            'site_id' => 1,
            'subnet_address' => '216.69.8.216',
            'mask_bits' => 29,
            'vLan' => 330,
        ]); 

    }
}
