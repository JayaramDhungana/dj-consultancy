<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    public function home()
    {
        $blogEntries = DB::table('blog')->orderBy('created_at', 'desc')->get();
        $studyAbroadEntries = DB::table('study_abroad')->orderBy('created_at', 'desc')->get();
        $testinomialsEntries = DB::table('testimonials_contents')->orderBy('created_at', 'desc')->get();
        $testinomialsTitles = DB::table('testimonials_titles')->where('id', 1)->first();
        $heroImages = DB::table('hero_image')->first();

        return view('frontend.home.home', compact('studyAbroadEntries', 'testinomialsEntries', 'testinomialsTitles', 'blogEntries', 'heroImages'));
    }
}
