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
        DB::table('blog')->insert([
            [
                'image' => 'blog1.jpg',
                'title' => 'Top 10 Tips for Studying Abroad',
                'details' => 'Studying abroad can be life-changing. Here are the top 10 tips to make the most of your international education experience...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'blog2.jpg',
                'title' => 'How to Choose the Right University',
                'details' => 'Choosing the right university is crucial. Consider factors such as program quality, location, and support services...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'blog3.jpg',
                'title' => 'Scholarships and Financial Aid for International Students',
                'details' => 'Financing your education abroad can be challenging. Learn about scholarships, grants, and other financial aid options available...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
