<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id'=> 1, 'name' => 'Administrator'],
            ['id'=> 2, 'name' =>'Supervisor'],
            ['id'=> 3, 'name' =>'Teacher'],
            ['id'=> 4, 'name' =>'Student'],

        ]);
    }
}
