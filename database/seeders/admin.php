<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;
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
            'id'=>15
            
        ]);
        User::create([
            'email'=>'bmvt@hcmut.edu.vn',
            'name'=>'BMVT',
            'password'=>'Bmvt@hcmut',
            'roles_id'=>'1'

        ]);
    }
}
