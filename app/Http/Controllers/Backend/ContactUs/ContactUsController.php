<?php

namespace App\Http\Controllers\Backend\ContactUs;

use App\Http\Controllers\Controller;
use DB;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        $contactUsEntries = DB::table('contact_us')->paginate(5);

        return view('backend.contact_us.contact_us', compact('contactUsEntries'));
    }

    public function deleteContactUs($id)
    {
        DB::table('contact_us')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
