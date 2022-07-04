<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'bmvt@hcmut.edu.vn',
            'name' => 'BMVT',
            'password' => Hash::make('Bmvt@hcmut'),
            'role_id' => 1
        ]);

    }
}