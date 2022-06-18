<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;
use App\Models\roles;

class create_roles_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       roles::create([
            'name'=>'Adminstrator'
       ]);

        roles::create([
            'name'=>'Supervisor'
       ]);

        roles::create([
            'name'=>'Teacher'
       ]);

        roles::create([
            'name'=>'Student'
       ]);
    }
}

