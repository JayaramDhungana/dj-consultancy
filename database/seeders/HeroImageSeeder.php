<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class HeroImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // inserting data
        DB::table('hero_image')->insertOrIgnore([
            [
                'image' => 'images/picture/pic-1.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
