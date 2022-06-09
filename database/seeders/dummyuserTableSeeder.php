<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dummyuserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('dummyusers')->insert([
    [
        'name' => 'sato',
        'email' => 'sato@sato',
        'phone' => '000',
    ],
    [
        'name' => 'tanaka',
        'email' => 'tanaka@tanaka',
        'phone' => '111',
    ],
    [
        'name' => 'takahashi',
        'email' => 'taka@hashi',
        'phone' => '222',
    ]    
    ]);
    }
}
