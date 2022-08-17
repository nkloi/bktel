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
            'name' => 'hennessy',
            'email' => 'hennessy@hcmut.edu.vn',
            'password' => Hash::make('Hennessy@hcmut'),
            'role_id' => '3',
            'teacher_id'=> '5'
            ]);
    }
}
