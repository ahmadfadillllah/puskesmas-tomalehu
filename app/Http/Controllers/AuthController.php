<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {

        return view('login');
    }

    public function postlogin(Request $request)
    {

        // dd($request->all());

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('server');
        }
            return redirect()->route('login')->with('notif', 'Email / Password Salah');

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('notif', 'Berhasil Logout');
    }
}
