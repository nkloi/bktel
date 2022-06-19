<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            config('constants.role.role_adminstrator')
        ]);
        DB::table('roles')->insert([
            config('constants.role.role_supervisor')
        ]);
        DB::table('roles')->insert([
            config('constants.role.role_teacher')
        ]);
        DB::table('roles')->insert([
            config('constants.role.role_student')
        ]);
    }
}
