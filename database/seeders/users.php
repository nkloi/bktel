<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'BMVT1',
            'email' => 'bmvt1@hcmut.edu.vn',
            'password' => Hash::make('Bmvt@hcmut'),
            'role_id' =>'1'
            ]);
    }
}
