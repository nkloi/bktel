<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $this->call(RolesDatabaseSeeder::class);
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
            Role::create([
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
        User::create([
            'id' => 1,
            'role_id' => 1,
            'email' => 'bmvt@hcmut.edu.vn',
            'name' => 'BMVT',
            'password' => Hash::make('Bmvt@hcmut'),
        ]);
    }
}
