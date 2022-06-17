<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['name'=>'Administrator','id'=>1],
            ['name'=>'Supervisor','id'=>2],
            ['name'=>'Teacher','id'=>3],
            ['name'=>'Student','id'=>4],
        ]);
    }
}
