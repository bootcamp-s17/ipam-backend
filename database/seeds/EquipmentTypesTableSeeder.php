<?php

use Illuminate\Database\Seeder;

class EquipmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        DB::table('equipment_types')->insert([
            'name' => "Printer",
        ]);

        DB::table('equipment_types')->insert([
            'name' => "Computer",
        ]);

        DB::table('equipment_types')->insert([
            'name' => "HVAC",
        ]);

        DB::table('equipment_types')->insert([
            'name' => "Door Controller",
        ]);

        DB::table('equipment_types')->insert([
            'name' => "Default Gateway",
        ]);

        DB::table('equipment_types')->insert([
            'name' => "Camera",
        ]);
        
        DB::table('equipment_types')->insert([
            'name' => "Wireless Access Point",
        ]);

        DB::table('equipment_types')->insert([
            'name' => "Other",
        ]);

        DB::table('equipment_types')->insert([
            'name' => "Placeholder",
        ]);

        DB::table('equipment_types')->insert([
            'name' => "Switch",
        ]);
    }
}

// ♣  Printer
// ♣  Computer
// ♣  Default Gateway (allow only one per subnet)
// ♣  HVAC
// ♣  Door Controller
// ♣  Camera
// ♣  Placeholder
