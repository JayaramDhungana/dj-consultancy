<?php

namespace App\Http\Controllers\Backend\Testimonials;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function testimonials()
    {
        $testinomialsEntries = DB::table('testimonials_contents')->paginate(5);
        $testinomialsTitles = DB::table('testimonials_titles')->get();

        return view('backend.testinomials.testinomials', compact('testinomialsEntries', 'testinomialsTitles'));
    }

    public function testimonials_create()
    {
        return view('backend.testinomials.testinomials_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'student_country' => 'required',
            'testimonials_message' => 'required',
        ], [
            'student_name.required' => 'Please enter the student name.',
            'student_country.required' => 'Please enter the student country.',
            'testimonials_message.required' => 'Please enter the testimonials message.',
        ]);

        // Insert using Query Builder
        DB::table('testimonials_contents')->insert([
            'student_name' => $request->student_name,
            'student_country' => $request->student_country,
            'testimonials_message' => $request->testimonials_message,
            'created_at' => now(),
            'updated_at' => now(), ]);

        return redirect()->route('testimonials')->with('success', 'Testimonials details added successfully!');

    }

    public function testinomials_edit(int $id)
    {
        $testinomialsEntry = DB::table('testimonials_contents')->find($id);

        return view('backend.testinomials.testinomials_edit', compact('testinomialsEntry'));
    }

    public function testinomials_update(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'student_country' => 'required',
            'testimonials_message' => 'required',
        ], [
            'student_name.required' => 'Please enter the student name.',
            'student_country.required' => 'Please enter the student country.',
            'testimonials_message.required' => 'Please enter the testimonials message.',
        ]);

        // update using Query Builder
        DB::table('testimonials_contents')->where('id', $request->id)->update([
            'student_name' => $request->student_name,
            'student_country' => $request->student_country,
            'testimonials_message' => $request->testimonials_message,
            'updated_at' => now(), ]);

        return redirect()->route('testimonials')->with('success', 'Testimonials Edited successfully!');

    }

    public function testinomials_delete(Request $request)
    {
        DB::table('testimonials_contents')->where('id', $request->id)->delete();

        return redirect()->route('testimonials')->with('success', 'Testimonials Deleted successfully!');
    }

    public function testinomials_titles_edit(int $id)
    {
        $testinomialsTitles = DB::table('testimonials_titles')->where('id', 1)->first();

        return view('backend.testinomials.testinomials_title_edit', compact('testinomialsTitles'));
    }

    public function testinomials_titles_update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ], [
            'title.required' => 'Please enter the title.',
            'subtitle.required' => 'Please enter the subtitle.',
        ]);

        DB::table('testimonials_titles')->where('id', $request->id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'updated_at' => now(),
        ]);

        return redirect()->route('testimonials')->with('success', 'Testimonials Title Edited successfully!');
    }
}
