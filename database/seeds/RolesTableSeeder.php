<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "system",
            'can_view_site' => false,
            'can_edit_site' => false,
            'can_view_subnet' => false,
            'can_edit_subnet' => false,
        ]);
        DB::table('roles')->insert([
            'name' => "admin",
            'can_view_site' => true,
            'can_edit_site' => true,
            'can_view_subnet' => true,
            'can_edit_subnet' => true,
        ]);
        DB::table('roles')->insert([
            'name' => "user",
            'can_view_site' => true,
            'can_edit_site' => false,
            'can_view_subnet' => true,
            'can_edit_subnet' => false,
        ]);
    }
}
