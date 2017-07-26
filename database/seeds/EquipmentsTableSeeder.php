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
            'equipment_type_id' => 8, //Other
            'model' => '',
            'driver' => '',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.200',
            'site_id' => 1,
            'subnet_id' =>'1',
            'mac_address' => '00-60-9f-93-79-b5',
            'mab' => false,
            'room_id'=> rand(1, 14),
        ]);


        DB::table('equipments')->insert([
            'name' => "BBLM-104A-Laser",
            'equipment_type_id' => 1, //Printer
            'model' => 'HP LaserJet Pro MFP M521dn',
            'driver' => 'uniFLOW Universal Driver',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.252',
            'site_id' => 1,
            'subnet_id' =>1,
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
            'equipment_type_id' => 1, //Printer
            'model' => 'KM 423-BK',
            'driver' => 'KONICA MINOLTA 423SeriesPS',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.254',
            'site_id' => 1,
            'subnet_id' =>1,
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
            'equipment_type_id' => 1, //Printer
            'model' => 'HP LaserJet 400 M401n',
            'driver' => 'uniFLOW Universal Driver',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.139.247',
            'site_id' => 1,
            'subnet_id' =>2,
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
            'equipment_type_id' => 1, //Printer
            'model' => 'HP LaserJet 600 M601',
            'driver' => 'uniFLOW Universal Driver',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.139.249',
            'site_id' => 1,
            'subnet_id' =>2,
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
            'equipment_type_id' => 4, //Door Controller
            'model' => '',
            'driver' => '',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.140.105',
            'site_id' => 1,
            'subnet_id' =>3,
            'mac_address' => '00-90-c2-e8-6e-67',
            'mab' => true,
            'room_id'=> rand(1, 14),
        ]);


        DB::table('equipments')->insert([
            'name' => "BLM-Sign-217",
            'equipment_type_id' => 2, //Computer
            'room_id' => 1,
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.33',
            'os_version' => 'Windows XP',
            'physical' => true,
            'site_id' => 1,
            'subnet_id' =>1,
            'host_name' => 'bobby',
            'port_number' => 80,
            'mac_address' => '00-01-80-76-bf-9c',
            'mab' => false,
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "BLM-114-TouchPanel",
            'equipment_type_id' => 8, //Other
            'room_id' => 4,
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.201',
            'site_id' => 1,
            'subnet_id' =>1,
            'mac_address' => '00-60-9f-93-ae-0d',
            'mab' => false,
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "BLM-204-MFP",
            'equipment_type_id' => 1, //Printer
            'model' => 'KM C454e-D',
            'driver' => 'KONICA MINOLTA C554SeriesPS',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.138.253',
            'site_id' => 1,
            'subnet_id' =>1,
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
            'equipment_type_id' => 1, //Printer
            'model' => 'uniFLOW Universal Driver',
            'driver' => 'KONICA MINOLTA C554SeriesPS',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.139.246',
            'site_id' => 1,
            'subnet_id' =>2,
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
            'equipment_type_id' => 1, //Printer
            'model' => 'HP LaserJet 400 color M451nw',
            'driver' => 'uniFLOW Universal Driver',
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.139.248',
            'site_id' => 1,
            'subnet_id' =>2,
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
            'equipment_type_id' => 4, //Door Controller
            'serial_number' => 'fake cereal',
            'ip_address' => '10.34.140.60',
            'site_id' => 1,
            'subnet_id' =>3,
            'mac_address' => '00-01-f0-8d-6e-d4',
            'mab' => true,
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "Asus Network Switch",
            'equipment_type_id' => 10, //Switch
            'serial_number' => 'fake cerebral',
            'ip_address' => '10.34.140.85',
            'switch_man_ip' => '192.168.0.85',
            'site_id' => 1,
            'subnet_id' =>3,
            'mac_address' => '03-01-f0-8d-6e-d4',
            'mab' => true,
            'room_id'=> rand(1, 14),
        ]);

        DB::table('equipments')->insert([
            'name' => "Computer Lab PC 1",
            'equipment_type_id' => 2, //Computer
            'serial_number' => 'fake cerebral',
            'ip_address' => '10.34.140.85',
            'os_version' => 'Windows 95',
            'physical' => true,
            'site_id' => 1,
            'subnet_id' =>3,
            'mac_address' => 'A3-01-f0-8d-6e-d4',
            'mab' => true,
            'room_id'=> rand(1, 14),
        ]);


    }
}

