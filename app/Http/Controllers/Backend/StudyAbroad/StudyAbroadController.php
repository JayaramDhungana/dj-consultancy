<?php

namespace App\Http\Controllers\Backend\StudyAbroad;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class StudyAbroadController extends Controller
{
    public function studyAbroad()
    {
        $studyAbroadEntries = DB::table('study_abroad')->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.study_abroad.study_abroad', compact('studyAbroadEntries'));
        // return redirect()->route('study_abroad')->with('success', 'Study Abroad details added successfully!');
    }

    // create
    public function studyAbroadCreate()
    {
        return view('backend.study_abroad.study_abroad_create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required',
            'header_image' => 'image|mimes:jpeg,png,jpg',
            'img1' => 'image|mimes:jpeg,png,jpg',
            'img2' => 'image|mimes:jpeg,png,jpg',
        ]);

        // Upload images
        $headerImage = $request->file('header_image')?->store('study_abroad', 'public');
        $img1 = $request->file('img1')?->store('study_abroad', 'public');
        $img2 = $request->file('img2')?->store('study_abroad', 'public');

        // Insert using Query Builder
        DB::table('study_abroad')->insert([
            'title' => $request->title,
            'header_image' => $headerImage,
            'img1' => $img1,
            'img2' => $img2,
            'text1' => $request->text1,
            'text2' => $request->text2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('study_abroad')->with('success', 'Study Abroad details added successfully!');
    }

    // Update
    public function studyAbroadEdit(int $id)
    {
        $studyAbroadEntry = DB::table('study_abroad')->find($id);

        return view('backend.study_abroad.study_abroad_edit', compact('studyAbroadEntry'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form
        $request->validate([
            'title' => 'required',
            'header_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'img1' => 'image|mimes:jpeg,png,jpg|max:2048',
            'img2' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Fetch old data
        $oldData = DB::table('study_abroad')->where('id', $id)->first();

        // Handle image updates
        $headerImage = $oldData->header_image;
        $img1 = $oldData->img1;
        $img2 = $oldData->img2;

        // If new header image uploaded
        if ($request->hasFile('header_image')) {
            $headerImage = $request->file('header_image')->store('study_abroad', 'public');
        }

        // If new img1 uploaded
        if ($request->hasFile('img1')) {
            $img1 = $request->file('img1')->store('study_abroad', 'public');
        }

        // If new img2 uploaded
        if ($request->hasFile('img2')) {
            $img2 = $request->file('img2')->store('study_abroad', 'public');
        }

        // Update the database
        DB::table('study_abroad')->where('id', $id)->update([
            'title' => $request->title,
            'header_image' => $headerImage,
            'img1' => $img1,
            'img2' => $img2,
            'text1' => $request->text1,
            'text2' => $request->text2,
            'updated_at' => now(),
        ]);

        return redirect()->route('study_abroad')->with('success', 'Study Abroad updated successfully!');
    }

    // Delete
    public function destroy($id)
    {
        DB::table('study_abroad')->where('id', $id)->delete();

        return redirect()->route('study_abroad')->with('success', 'Study Abroad Deleted successfully!');
    }
}
