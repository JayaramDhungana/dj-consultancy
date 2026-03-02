<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('login')->insert([
            'email' => 'superadmin@gmail.com',
            'password' => 'admin@123', //
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
