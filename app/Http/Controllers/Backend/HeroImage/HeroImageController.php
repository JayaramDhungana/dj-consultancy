<?php

namespace App\Http\Controllers\Backend\HeroImage;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class HeroImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $heroImages = DB::table('hero_image')->first();
        return view('backend.hero_image.hero_image', compact('heroImages'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $heroImage = DB::table('hero_image')->where('id', $id)->first();
        return view('backend.hero_image.hero_image_edit', compact('heroImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'images/picture/' . $filename;
            $file->move(public_path('images/picture'), $filename);
            $data['image'] = $filePath;
        }

        DB::table('hero_image')->where('id', $id)->update($data);

        return redirect()->route('hero-images.index')->with('success', 'Hero Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('hero_image')->where('id', $id)->delete();
        return redirect()->route('hero-images.index')->with('success', 'Hero Image deleted successfully.');
    }
}
