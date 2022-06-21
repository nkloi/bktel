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
            'name' => 'nductri',
            'email' => 'nductri@hcmut.edu.vn',
            'password' => Hash::make('Nductri@hcmut'),
            'role_id' => '4'
            ]);
    }
}
