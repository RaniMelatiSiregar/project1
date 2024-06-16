<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            'title' => 'system analys',
            'biografi' => 'saya bekerja sebagai system analys'
        ]);

        DB::table('profiles')->insert([
            'title' => 'Data modeler',
            'biografi' => 'saya bekerja sebagai data analyst'
        ]);
    }
}
