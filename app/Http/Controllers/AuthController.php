<?php

namespace App\Http\Controllers;

use App\Constant\Systems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function signin()
    {
        return view('Admin.Auth.signin');
    }

    public function signinAction(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(['username' => $username, 'password' => $password]) || Auth::attempt(['email' => $username, 'password' => $password])) {
            Session::flash(Systems::sessionSuccess, 'Signin Success\n Anda berhasil Login');
            return $this->success('success');
        }

        Session::flash(Systems::sessionError, 'Signin Failed\n Anda gagal Login');
        return $this->failed('failed');
    }

    public function signout()
    {
        Auth::logout();
        Session::flash(Systems::sessionSuccess, 'Signout Success\n Anda berhasil Logout');
        return redirect('/signin');
    }
}
