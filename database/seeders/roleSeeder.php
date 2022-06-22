<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([

            'name'=> 'bmvt',
            'email'=> 'bmvtbk@gmail.com',
            'password' => Hash::make('Bmvt@hcmut'),
            'role_id'=> 1,

        ]);
        // DB::table('roles')->insert([
        //     ['name' => 'Administrator'],
        //     ['name' => 'Supervisor'],
        //     ['name' => 'Teacher'],
        //     ['name' => 'Student'],
        // ]);
    }
}
