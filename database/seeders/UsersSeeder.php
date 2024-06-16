<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'rani',
            'name' => 'melati',
            'email' => 'rani@gmail.com',
            'password' => bcrypt ('123456')
        ]);
    }
}
