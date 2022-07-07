<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert([
             ['name' => 'Administrator'],
             ['name' =>'Supervisor'],
             ['name' =>'Teacher'],
             ['name' =>'Student'],
         ]);
    }
}
