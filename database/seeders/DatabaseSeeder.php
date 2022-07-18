<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Role;
use Illuminate\Database\User;

use Illuminate\Database\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // $this->call(RolesDatabaseSeeder::class);
        $this->call(UserDatabaseSeeder::class);
    }
}
class RolesDatabaseSeeder extends Seeder 
{

        public function run()
        {
            $roles = [
                ['1', 'Administrator'],
                ['2', 'Supervisor'],
                ['3', 'Teacher'],
                ['4', 'Student'],
            ];
    
            foreach ($roles as $role) {
                ModelsRole::create([
                    'id' => $role[0],
                    'name' => $role[1],
                ]);
            }
        }
}

class UserDatabaseSeeder extends Seeder
{

        public function run()
        {
            ModelsUser::create([
                'id' => 1,
                'role_id' => 1,
                'email' => 'bmvt@hcmut.edu.vn',
                'name' => 'BMVT',
                'password' =>FacadesHash::make('Bmvt@hcmut'),
            ]);
        }
    
}
