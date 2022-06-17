<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'Administrator', 'id' => 1
        ]);
        DB::table('roles')->insert([
            'name'=>'Supervisor', 'id' => 2
        ]);
        DB::table('roles')->insert([
            'name'=>'Teacher', 'id' => 3
        ]);
        DB::table('roles')->insert([
            'name'=>'Student', 'id' => 4
        ]);
    }
}
