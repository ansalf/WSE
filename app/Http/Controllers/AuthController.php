<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signin() {
        return view('Admin.Auth.signin');
    }

    public function signinAction(Request $request) {
        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            Session::flash('success', 'Signin Success\n Anda berhasil Login');
            return redirect('/dashboard');
        }else if (Auth::attempt(['email' => $username, 'password' => $password])) {
            Session::flash('success', 'Signin Success\n Anda berhasil Login');
            return redirect('/dashboard');
        }
        
        Session::flash('error', 'Signin Failed\n Anda gagal Login');
        return redirect('/signin');
    }

    public function signout() {
        Auth::logout();
        Session::flash('success', 'Signout Success\n Anda berhasil Logout');
        return redirect('/signin');
    }
}
