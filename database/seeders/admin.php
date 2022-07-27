<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;
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
        User::create([
            'email'=>'bmvt@hcmut.edu.vn',
            'name'=>'BMVT',
            'password'=> Hash::make('Bmvt@hcmut'),
            'role_id'=> '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);
    }
}
