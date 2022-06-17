<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name'=>'Administrator'
        ]);
        Role::create([
            'name'=>'Supervisor'
        ]);
        Role::create([
            'name'=>'Teacher'
        ]);
        Role::create([
            'name'=>'Student'
        ]);
    }
}
