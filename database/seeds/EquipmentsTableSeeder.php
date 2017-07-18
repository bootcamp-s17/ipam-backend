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
            'name' => "BLM-114-NI AMX Netlinx for Podium",
            'equipment_types_id' => 8,
            'model' => '',
            'driver' => '',
            // 'serial_number' => '',(always)
            'ip_address' => '10.34.138.200',
            'site_id' => 1,
            // 'host_name' => 'bobby',(always)
            // 'port_number' => 80,(always)
            'mac_address' => 00-60-9f-93-79-b5,
            'mab' => false,
            // 'printer_Server' => '',
            // 'printer_name' => ,
            // 'share_name' => ,
            // 'share_comment' => ,
            'room_id'=> 2,
        ]);


        DB::table('rooms')->insert([
            'name' => "BBLM-104A-Laser",
            'equipment_types_id' => 1,
            'model' => 'HP LaserJet Pro MFP M521dn',
            'driver' => 'uniFLOW Universal Driver',
            // 'serial_number' => '',(always)
            'ip_address' => '10.34.138.252',
            'site_id' => 1,
            // 'host_name' => 'bobby',(always)
            // 'port_number' => 80,(always)
            'mac_address' => 00-04-00-cd-a1-b7,
            'mab' => true,
            'printer_Server' => 'BLM-RPS',
            'printer_name' => 'BLM-104A-Laser',
            'share_name' => 'BLM-104A-Laser',
            'share_comment' => 'BLM-104A HP LaserJet Pro MFP M521dn',
            'room_id'=> 4,
        ]);

        DB::table('rooms')->insert([
            'name' => "BLM-107-MFP",
            'equipment_types_id' => 1,
            'model' => 'KM 423-BK',
            'driver' => 'KONICA MINOLTA 423SeriesPS',
            // 'serial_number' => '',(always)
            'ip_address' => '10.34.138.254',
            'site_id' => 1,
            // 'host_name' => 'bobby',(always)
            // 'port_number' => 80,(always)
            'mac_address' => 00-20-6b-7e-43-14,
            'mab' => true,
            'printer_Server' => 'BLM-RPS',
            'printer_name' => 'BLM-107-MFP',
            'share_name' => 'BLM-107-MFP',
            'share_comment' => 'BLM-107 KM 423-BK',
            'room_id'=> 6,
        ]);

        DB::table('rooms')->insert([
            'name' => "BLM-AE-114B-Laser",
            'equipment_types_id' => 1,
            'model' => 'HP LaserJet 400 M401n',
            'driver' => 'uniFLOW Universal Driver',
            // 'serial_number' => '',(always)
            'ip_address' => '10.34.139.247',
            'site_id' => 1,
            // 'host_name' => 'bobby',(always)
            // 'port_number' => 80,(always)
            'mac_address' => 24-be-05-e7-39-d0,
            'mab' => true,
            'printer_Server' => 'BLM-RPS',
            'printer_name' => 'BLM-AE-114B-Laser',
            'share_name' => 'BLM-AE-114B-Laser',
            'share_comment' => 'BLM-114B Adult Ed HP LaserJet 400 M401n',
            'room_id'=> 8,
        ]);

        DB::table('rooms')->insert([
            'name' => "BLM-204-Laser",
            'equipment_types_id' => 1,
            'model' => 'HP LaserJet 600 M601',
            'driver' => 'uniFLOW Universal Driver',
            // 'serial_number' => '',(always)
            'ip_address' => '10.34.139.249',
            'site_id' => 1,
            // 'host_name' => 'bobby',(always)
            // 'port_number' => 80,(always)
            'mac_address' => 00-9c-02-02-f8-4f,
            'mab' => true,
            'printer_Server' => 'BLM-RPS',
            'printer_name' => 'BLM-204-Laser',
            'share_name' => 'BLM-204-Laser',
            'share_comment' => 'BLM-204 HP LaserJet 600 M601',
            'room_id'=> 10,
        ]);

        DB::table('rooms')->insert([
            'name' => "Door Controller",
            'equipment_types_id' => 4,
            'model' => '',
            'driver' => '',
            // 'serial_number' => '',(always)
            'ip_address' => '10.34.140.105',
            'site_id' => 1,
            // 'host_name' => 'bobby',(always)
            // 'port_number' => 80,(always)
            'mac_address' => 00-90-c2-e8-6e-67,
            'mab' => true,
            // 'printer_Server' => '',
            // 'printer_name' => ,
            // 'share_name' => ,
            // 'share_comment' => ,
            'room_id'=> 34,
        ]);

    }
}

