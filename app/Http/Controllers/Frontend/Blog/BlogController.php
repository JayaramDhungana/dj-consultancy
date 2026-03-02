<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use DB;

class BlogController extends Controller
{
    public function blog()
    {
        $studyAbroadEntries = DB::table('study_abroad')->orderBy('created_at', 'desc')->get();
        $blogEntries = DB::table('blog')->orderBy('created_at', 'desc')->get();

        return view('frontend.blog.blog', compact('studyAbroadEntries', 'blogEntries'));
    }

    public function details($id)
    {
        $blogEntries = DB::table('blog')->orderBy('created_at', 'desc')->get();

        $studyAbroadEntries = DB::table('study_abroad')->orderBy('created_at', 'desc')->get();
        $entry = DB::table('blog')
            ->where('id', $id)
            ->first();

        if (! $entry) {
            abort(404);
        }

        return view('frontend.blog.blog_details', compact('entry', 'studyAbroadEntries', 'blogEntries'));
    }
}
