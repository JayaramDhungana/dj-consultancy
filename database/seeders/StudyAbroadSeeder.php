<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class StudyAbroadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('study_abroad')->insert([
            [
                'title' => 'Study in the USA',
                'header_image' => 'images/picture/australia_head.jpg',
                'img1' => 'images/picture/australia1.jpg',
                'img2' => 'images/picture/australia2.jpg',
                'text1' => 'Studying in the USA offers excellent academic opportunities and cultural experiences.',
                'text2' => 'Universities provide diverse programs and support for international students.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
