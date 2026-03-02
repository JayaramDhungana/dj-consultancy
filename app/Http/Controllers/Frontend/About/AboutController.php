<?php

namespace App\Http\Controllers\Frontend\About;

use App\Http\Controllers\Controller;
use DB;

class AboutController extends Controller
{
    public function about()
    {
        $blogEntries = DB::table('blog')->orderBy('created_at', 'desc')->get();
        $studyAbroadEntries = DB::table('study_abroad')->orderBy('created_at', 'desc')->get();

        return view('frontend.about_us.about_us', compact('studyAbroadEntries', 'blogEntries'));
    }
}
