<?php

use Illuminate\Database\Seeder;

class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name' => "BLM-Sign-217",
            'equipment_types_id' => 2,
            'model' => '',
            'driver' => '',
            'serial_number' => '',
            'ip_address' => 10.34.138.33,
            'site_id' => 1,
            'host_name' => 'bobby',
            'port_number' => 80,
            'mac_address' => 00-01-80-76-bf-9c,
            'mab' => false,
            'printer_Server' => '',
            'printer_name' => ,
            'share_name' => ,
            'share_comment' => ,
        ]);
    }
}

