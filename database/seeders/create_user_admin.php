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
            'name' => 'role 2 co thong tin',
            'email' => 'nha1234@hcmut.edu.vn',
            'password' => Hash::make('123123123'),
            'role_id'=> 2,
        ]);


    }
}
