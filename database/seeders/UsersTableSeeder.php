<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name'=>'lyhorklim',
            'email'=>'lyhorklim@gmail.com',
            'password' => bcrypt('123456')
            ],
            [
            'name'=>'limlyhork',
            'email'=>'limlyhork@gmail.com',
            'password' => bcrypt('123456')
            ],
        ]);
    }
}
