<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'BMVT',
            'email' => 'bmvt@hcmut.edu.vn',
            'password' => Hash::make('Bmvt@hcmut'),
            'roles_id' =>'1'
            ]);
    }
}
