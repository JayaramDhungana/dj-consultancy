<?php

namespace App\Http\Controllers\Backend\IndustryPartner;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class IndustryPartnerController extends Controller
{
    public function index()
    {
        $industryPartners = DB::table('industry_partners')->get();
        return view('backend.industry_partner.industry_partner', compact('industryPartners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.industry_partner.industry_partner_create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
        [
            'name.required' => 'The name field is required.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
        ]); 
      $image = $request->file('image')?->store('industry_partner', 'public');
        DB::table('industry_partners')->insert([
            'name' => $request->name,
            'image' => $image,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('industry-partners.index')->with('success', 'Industry Partner entry created successfully.');
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
        $industryPartner = DB::table('industry_partners')->where('id', $id)->first();
        return view('backend.industry_partner.industry_partner_edit', compact('industryPartner'));
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
            $filePath = 'industry_partner/' . $filename;
            $file->move(public_path('storage/industry_partner'), $filename);
            $data['image'] = $filePath;
        }
        if ($request->has('name')) {
            $data['name'] = $request->name;
        }

        DB::table('industry_partners')->where('id', $id)->update($data);

        return redirect()->route('industry-partners.index')->with('success', 'Industry Partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('industry_partners')->where('id', $id)->delete();
        return redirect()->route('industry-partners.index')->with('success', 'Industry Partner deleted successfully.');
    }
}
