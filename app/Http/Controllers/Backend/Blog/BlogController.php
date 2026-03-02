<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function Blog()
    {
        $blogEntries = DB::table('blog')->orderBy('created_at', 'desc')->paginate(5);

        return view('backend.blog.blog', compact('blogEntries'));
    }

    public function BlogCreate()
    {
        return view('backend.blog.blog_create');
    }

    // insert Data
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg',
            'title' => 'required',
            'details' => 'required',
        ]);

        // Upload images
        // $image = $request->file('image')?->store('blog', 'public');
        $image = $request->file('image')?->store('blog', 'public');

        // Insert using Query Builder
        DB::table('blog')->insert([
            'image' => $image,
            'title' => $request->title,
            'details' => $request->details,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('backend_blog')->with('success', 'Study Abroad details added successfully!');
    }

    // update
    public function blogEdit(int $id)
    {
        $blogEntry = DB::table('blog')->find($id);

        return view('backend.blog.blog_edit', compact('blogEntry'));
    }

    public function blogUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'title' => 'required',
            'details' => 'required',
        ]);

        // fetch old blog data (CORRECT TABLE)
        $oldData = DB::table('blog')->where('id', $id)->first();

        if (! $oldData) {
            abort(404, 'Blog not found');
        }

        $image = $oldData->image;

        // if new image uploaded
        if ($request->hasFile('image')) {

            // delete old image
            if ($image && \Storage::disk('public')->exists($image)) {
                \Storage::disk('public')->delete($image);
            }

            // store new image
            $image = $request->file('image')->store('blog', 'public');
        }

        // update blog (ALWAYS)
        DB::table('blog')->where('id', $id)->update([
            'image' => $image,
            'title' => $request->title,
            'details' => $request->details,
            'updated_at' => now(),
        ]);

        return redirect()->route('backend_blog')->with('success', 'Blog updated successfully!');
    }

    // Delete
    public function destroy($id)
    {
        DB::table('blog')->where('id', $id)->delete();

        return redirect()->route('backend_blog')->with('success', 'Blog Deleted successfully!');
    }
}
