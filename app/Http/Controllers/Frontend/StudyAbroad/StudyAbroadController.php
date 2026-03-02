<?php

namespace App\Http\Controllers\Frontend\StudyAbroad;

use App\Http\Controllers\Controller;
use DB;

class StudyAbroadController extends Controller
{
    public function show($id)
    {
        $studyAbroadEntries = DB::table('study_abroad')->orderBy('created_at', 'desc')->get();

        $entry = DB::table('study_abroad')->where('id', $id)->first();
        $blogEntries = DB::table('blog')->orderBy('created_at', 'desc')->get();

        if (! $entry) {
            abort(404); // If entry not found
        }

        return view('frontend.study_abroad.study_abroad', compact('entry', 'studyAbroadEntries','blogEntries'));
    }
}
