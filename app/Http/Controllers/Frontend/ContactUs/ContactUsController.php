<?php

namespace App\Http\Controllers\Frontend\ContactUs;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        $blogEntries = DB::table('blog')->orderBy('created_at', 'desc')->get();
        $studyAbroadEntries = DB::table('study_abroad')->orderBy('created_at', 'desc')->get();

        return view('frontend.contact_us.contact_us', compact('studyAbroadEntries', 'blogEntries'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:4',)
        // ],
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'mobile_number' => 'required',
            'study_destination' => 'required',
            'study_year' => 'required',
            'study_intake' => 'required',
        ], [
            'name.required' => 'Please Enter your Name',
            'email.required' => 'Please Enter your Email',
            'email.email' => 'Invalid Email Address',
            'address.required' => 'Please enter your Adderess',
            'mobile_number.required' => 'Please Enter your Mobile Number',
            'study_destination.required' => 'Please Select Study Destination',
            'study_year.required' => 'Please Select Study Year',
            'study_intake.required' => 'Please Select Study Intake',
        ]);
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $mobile_number = $request->mobile_number;
        $study_destination = $request->study_destination;
        $study_year = $request->study_year;
        $study_intake = $request->study_intake;

        DB::table('contact_us')->insert([
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'mobile_number' => $mobile_number,
            'study_destination' => $study_destination,
            'study_year' => $study_year,
            'study_intake' => $study_intake,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // return redirect()->route('contact_us')->with('success','Successfully inserted data');
        return redirect()->back()->with('success', 'Successfully inserted data');

    }
}
