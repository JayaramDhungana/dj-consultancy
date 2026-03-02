<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TestimonialsContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials_contents')->insert([
            [
                'student_name' => 'John Doe',
                'student_country' => 'USA',
                'testimonials_message' => 'This course completely changed my perspective. Highly recommend!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_name' => 'Maria Rossi',
                'student_country' => 'Italy',
                'testimonials_message' => 'The instructors were amazing and supportive throughout the learning journey.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_name' => 'Akira Yamamoto',
                'student_country' => 'Japan',
                'testimonials_message' => 'I learned so much in such a short period. Great experience!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
