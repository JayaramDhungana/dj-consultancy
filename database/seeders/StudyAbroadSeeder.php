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
        DB::table('study_abroad')->insertOrIgnore([
            [
                'title' => 'Study in the Australia',
                'header_image' => 'study_abroad/australia_head.png',
                'img1' => 'study_abroad/australia1.jpg',
                'img2' => 'study_abroad/australia2.jpg',
                'text1' => '<h2><strong>Why Study In Australia</strong></h2><ul><li>Top-ranked universities</li><li>Globally recognized degrees</li><li>Research excellence</li><li>Multicultural environment</li><li>Safe and friendly cities</li><li>Unique lifestyle</li><li>Work while studying&nbsp;</li></ul>',
                'text2' => '<h2>Something About Australia</h2><p>Australia is a vast and diverse country known for its unique landscapes, vibrant cities, and rich cultural heritage. Officially called the Commonwealth of Australia, it is the world’s sixth-largest nation by land area, located in the Southern Hemisphere with Canberra as its capital and Sydney as its largest city. The country is famous for its natural wonders such as the Great Barrier Reef and the Outback, while also being home to one of the world’s oldest continuing cultures—the Aboriginal and Torres Strait Islander peoples. Australia operates as a federal parliamentary constitutional monarchy, with English as its national language and a multicultural population that reflects its openness to the world. Its strong economy, democratic values, and reputation for innovation make it not only a popular travel destination but also a leading choice for international students and professionals</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
