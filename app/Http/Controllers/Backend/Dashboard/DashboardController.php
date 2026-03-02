<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalContacts = DB::table('contact_us')->count();
        $totalBlogs = DB::table('blog')->count();
        $totalCountries = DB::table('study_abroad')->count();

        return view('backend.dashboard.dashboard', compact('totalContacts', 'totalBlogs', 'totalCountries'));
    }
}
