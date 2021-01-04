<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthsController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }
    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('username', 'password')))
        {
            return redirect ('/');
        }
            return redirect ('/login')->with('error', 'username dan password tidak cocok!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
