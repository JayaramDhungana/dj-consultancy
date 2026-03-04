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
        DB::table('testimonials_contents')->insertOrIgnore([
            [
                'student_name' => 'Sushant Pant',
                'student_country' => 'USA',
                'testimonials_message' => 'Studying abroad with this program was a life-changing experience. It broadened my outlook, gave me confidence, and helped me grow both academically and personally. I would highly recommend it to anyone considering studying abroad.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_name' => 'Ram Kumar Timalsina',
                'student_country' => 'Germany',
                'testimonials_message' => 'The study abroad program gave me exposure to new cultures and academic perspectives. I gained confidence, made lifelong friends, and truly enjoyed every moment. It was a great experience that I’ll always cherish.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_name' => 'Shubham Mall',
                'student_country' => 'Canada',
                'testimonials_message' => 'The study abroad program opened up incredible opportunities for me. I was able to experience diverse cultures, expand my academic knowledge, and build lifelong connections. It was truly a life-changing experience that I will never forget.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
