<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ContactsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contacts')->insert([
            'nama' => 'rani',
            'email' => 'rani@gmail.com',
            'nomor_hp' => '0834526227',
            'pesan' => 'hai'
        ]);
    }
}
