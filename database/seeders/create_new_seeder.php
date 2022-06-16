<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class create_new_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Administrator'],
            ['name' => 'Supervisor'],
            ['name' => 'Teacher'],
            ['name' => 'Student'],
            
        ]);
    }
}
