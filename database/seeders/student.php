<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class student extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'tringuyen',
            'email' => 'tringuyen@hcmut.edu.vn',
            'password' => Hash::make('TriNguyen@hcmut'),
            'role_id' => '4',
            'student_id'=> '1'
            ]);
    }
}
