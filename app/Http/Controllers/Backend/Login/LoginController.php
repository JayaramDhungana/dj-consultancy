<?php

namespace App\Http\Controllers\Backend\Login;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('backend.login.login_page');

    }

    public function signin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ],
            [
                'email.required' => 'Please enter your email',
                'email.email' => 'Please Enter Valid Email Format',
                'password.required' => 'Please Enter Your Password',
                'password.min' => 'Password must be at least 4 characters',
            ]
        );
        $email = $request->email;
        $password = $request->password;
        $user = DB::table('login')->where('email', $email)->first();

        if (! $user) {
            return view('backend.login.login_page', ['failMessage' => 'Your Account is not found']);
        }
        if ($user->password != $password) {
            return view('backend.login.login_page', ['failMessage' => 'Incorrect Password']);
        }

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush(); // sabai session delete

        return redirect()->route('login')->with('successMessage', 'Logged out successfully!');
    }
}
