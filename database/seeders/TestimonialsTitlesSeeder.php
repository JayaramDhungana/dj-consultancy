<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TestimonialsTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('testimonials_titles')->insertOrIgnore([
            [
                'title' => 'Our Happy Clients',
                'subtitle' => 'See what our customers are saying about us',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
