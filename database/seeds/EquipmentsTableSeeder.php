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

        DB::table('equipments')->insert([
            'name' => "BLM-114-NI AMX Netlinx for Podium",
            'equipment_type_id' => 8,
            'model' => '',
            'driver' => '',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.200',
            'site_id' => 1,
            'subnet_id' =>'1',
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '00-60-9f-93-79-b1',
            'mab' => false,
            // 'printer_server' => '',
            // 'printer_name' => ,
            // 'share_name' => ,
            // 'share_comment' => ,
            'room_id'=> rand(1, 14),
        ]);


        DB::table('equipments')->insert([
            'name' => "BBLM-104A-Laser",
            'equipment_type_id' => 1,
            'model' => 'HP LaserJet Pro MFP M521dn',
            'driver' => 'uniFLOW Universal Driver',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.252',
            'site_id' => 1,
            'subnet_id' =>1,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '00-04-00-cd-a1-b7',
            'mab' => true,
            'printer_server' => 'BLM-RPS',
            'printer_name' => 'BLM-104A-Laser',
            'share_name' => 'BLM-104A-Laser',
            'share_comment' => 'BLM-104A HP LaserJet Pro MFP M521dn',
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "BLM-107-MFP",
            'equipment_type_id' => 1,
            'model' => 'KM 423-BK',
            'driver' => 'KONICA MINOLTA 423SeriesPS',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.254',
            'site_id' => 1,
            'subnet_id' =>1,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '00-20-6b-7e-43-14',
            'mab' => true,
            'printer_server' => 'BLM-RPS',
            'printer_name' => 'BLM-107-MFP',
            'share_name' => 'BLM-107-MFP',
            'share_comment' => 'BLM-107 KM 423-BK',
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "BLM-AE-114B-Laser",
            'equipment_type_id' => 1,
            'model' => 'HP LaserJet 400 M401n',
            'driver' => 'uniFLOW Universal Driver',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.139.247',
            'site_id' => 1,
            'subnet_id' =>2,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '24-be-05-e7-39-d0',
            'mab' => true,
            'printer_server' => 'BLM-RPS',
            'printer_name' => 'BLM-AE-114B-Laser',
            'share_name' => 'BLM-AE-114B-Laser',
            'share_comment' => 'BLM-114B Adult Ed HP LaserJet 400 M401n',
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "BLM-204-Laser",
            'equipment_type_id' => 1,
            'model' => 'HP LaserJet 600 M601',
            'driver' => 'uniFLOW Universal Driver',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.139.249',
            'site_id' => 1,
            'subnet_id' =>2,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '00-9c-02-02-f8-4f',
            'mab' => true,
            'printer_server' => 'BLM-RPS',
            'printer_name' => 'BLM-204-Laser',
            'share_name' => 'BLM-204-Laser',
            'share_comment' => 'BLM-204 HP LaserJet 600 M601',
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "Door Controller",
            'equipment_type_id' => 4,
            'model' => '',
            'driver' => '',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.140.105',
            'site_id' => 1,
            'subnet_id' =>3,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '00-90-c2-e8-6e-67',
            'mab' => true,
            // 'printer_server' => '',
            // 'printer_name' => ,
            // 'share_name' => ,
            // 'share_comment' => ,
            'room_id'=> rand(1, 14),
        ]);


        DB::table('equipments')->insert([
            'name' => "BLM-Sign-217",
            'equipment_type_id' => 2,
            'room_id' => 1,
            // 'model' => '',
            // 'driver' => '',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.33',
            'site_id' => 1,
            'subnet_id' =>1,
            'host_name' => 'bobby',
            'port_number' => 80,
            'mac_address' => '00-01-80-76-bf-9c',
            'mab' => false,
            // 'printer_server' => '',
            // 'printer_name' => ,
            // 'share_name' => ,
            // 'share_comment' => ,
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "BLM-114-TouchPanel",
            'equipment_type_id' => 8,
            'room_id' => 4,
            // 'model' => '',
            // 'driver' => '',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.201',
            'site_id' => 1,
            'subnet_id' =>1,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '00-60-9f-93-ae-0d',
            'mab' => false,
            // 'printer_server' => '',
            // 'printer_name' => ,
            // 'share_name' => ,
            // 'share_comment' => ,
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "BLM-204-MFP",
            'equipment_type_id' => 1,
            'model' => 'KM C454e-D',
            'driver' => 'KONICA MINOLTA C554SeriesPS',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.253',
            'site_id' => 1,
            'subnet_id' =>1,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '00-20-6b-82-85-0f',
            'mab' => true,
            'printer_server' => 'BLM-RPS',
            'printer_name' => 'BLM-204-MFP',
            'share_name' => 'BLM-204-MFP',
            'share_comment' => 'BLM-204 KM C454e-D',
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "BLM-AE-106B-Laser",
            'equipment_type_id' => 1,
            'model' => 'uniFLOW Universal Driver',
            'driver' => 'KONICA MINOLTA C554SeriesPS',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.139.246',
            'site_id' => 1,
            'subnet_id' =>2,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '00-01-e6-4e-06-98',
            'mab' => true,
            'printer_server' => 'BLM-RPS',
            'printer_name' => 'BLM-AE-106B-Laser',
            'share_name' => 'BLM-AE-106B-Laser',
            'share_comment' => 'BLM-106B Adult Ed HP LaserJet 4300',
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "BLM-AE-114A-Color",
            'equipment_type_id' => 1,
            'model' => 'HP LaserJet 400 color M451nw',
            'driver' => 'uniFLOW Universal Driver',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.139.248',
            'site_id' => 1,
            'subnet_id' =>2,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '24-be-05-ea-19-e8',
            'mab' => true,
            'printer_server' => 'BLM-RPS',
            'printer_name' => 'BLM-AE-114A-Color',
            'share_name' => 'BLM-AE-114A-Color',
            'share_comment' => 'BLM-114A Adult Ed HP LaserJet 400 color M451nw',
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "HVAC Controller",
            'equipment_type_id' => 4,
            // 'model' => 'HP LaserJet 400 color M451nw',
            // 'driver' => 'uniFLOW Universal Driver',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.140.60',
            'site_id' => 1,
            'subnet_id' =>3,
            // 'host_name' => 'bobby',
            // 'port_number' => 80,
            'mac_address' => '00-01-f0-8d-6e-d4',
            'mab' => true,
            // 'printer_server' => 'BLM-RPS',
            // 'printer_name' => 'BLM-AE-114A-Color',
            // 'share_name' => 'BLM-AE-114A-Color',
            // 'share_comment' => 'BLM-114A Adult Ed HP LaserJet 400 color M451nw',
            'room_id'=> rand(1, 14),
        ]);

    }
}

