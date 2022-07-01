<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(rolesTable::class);
        $this->call(createAdmin::class);
    }

    
}
class rolesTable extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Administrator'],
            ['name' => 'Supervisor'],
            ['name' => 'Teacher'],
            ['name' => 'Student'],
        ]);
    }
}

class createAdmin extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            
            'role_id' => 1,
            'email' => 'bmvt@hcmut.edu.vn',
            'name' => 'BMVT',
            'password' => 'Bmvt@hcmut',
        ]);
    }
}
