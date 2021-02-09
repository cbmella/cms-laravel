<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CreateRoleHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data in relationship for ADMIN and permissions
        foreach (range(1, 20) as $i) {
            DB::insert('insert into role_has_permissions (permission_id , role_id ) values (?, ?)', [$i, 1]);
        }
        //insert data for Editor Role
        foreach (range(5, 8) as $i) {
            DB::insert('insert into role_has_permissions (permission_id , role_id ) values (?, ?)', [$i, 2]);
        }
    }
}
