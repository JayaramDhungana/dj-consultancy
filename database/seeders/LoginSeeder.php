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
      // Only insert if not exists
        DB::table('login')->updateOrInsert(
            ['email' => 'superadmin@gmail.com'], // check existing email
            [
                'password' => 'admin@123', // secure hashed password
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
