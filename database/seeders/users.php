<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['email' => 'bmvt@hcmut.edu.vn',
            'password' =>'Bmvt@hcmut',
            'roles_id' =>'1']

        ]);
    }
}
