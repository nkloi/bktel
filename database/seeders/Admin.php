<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class Admin extends Seeder
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
            'password'=>'Bmvt@hcmut',
            'role_id'=>'1',
        ]);
    }
}
