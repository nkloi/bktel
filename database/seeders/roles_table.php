<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Seeder;

class roles_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        roles::create([
            'name'=>'Administrator'
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
