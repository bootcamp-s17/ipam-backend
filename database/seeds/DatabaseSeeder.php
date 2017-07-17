<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SitesTypesTableSeeder::class);
        $this->call(EquipmentTypesTableSeeder::class);
        $this->call(EquipmentsTableSeeder::class);
        $this->call(SubnetsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(NotesTableSeeder::class);
    }
}
