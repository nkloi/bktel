<?php

namespace Database\Seeders;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'BMVT',
            'email' => 'bmvt@hcmut.edu.vn',
            'password' => 'Bmvt@hcmut.edu',
            'role_id' => '4',
            'student_id' => '1'
        ]);

    }
}
