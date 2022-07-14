<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
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
        Student::create([
        'student_code' => '11231' 
        ]);

        User::create([
        'name' => 'BMVT',
        'email' => 'bmvt1@hcmut.edu.vn',
        'student_id' => '131289',
        'password' => Hash::make('Bmvt@hcmut'),
        'role_id' => '1'
        ]);
    }
}
