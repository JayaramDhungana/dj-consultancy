<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog')->insertOrIgnore([
            [
                'image' => 'blog/blog1',
                'title' => 'Top 10 Tips for Studying Abroad',
                'details' => 'Studying abroad can be life-changing. Here are the top 10 tips to make the most of your international education experience...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
