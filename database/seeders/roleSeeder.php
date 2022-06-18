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
        //
        DB::table('users')->insert([

            'name'=> 'duykhanh',
            'email'=> 'duykhanh88899@gmail.com',
            'password' => Hash::make('Bmvt@hcmut'),
            'role_id'=> '4',


        ]);
    }
}
