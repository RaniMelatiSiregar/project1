<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
class HomesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('homes')->insert([
            'title' => 'Go ahead!',
            'about' => 'selamat datang di website rani'
        ]);
    }
}
