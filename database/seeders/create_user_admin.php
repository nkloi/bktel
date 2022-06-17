<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class create_user_admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'name' => 'Le Thanh Nha',
            'email' => 'nhale@hcmut.edu.vn',
            'password' => Hash::make('123123123'),
            'role_id'=> 4,
        ]);
           
       
    }
}
