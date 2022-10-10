<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLogin() {
        return view('auth.login');
    }

    public function viewRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $credential = $request->validate([
           'name' => 'required',
           'email' => 'required|email:dns|unique:users',
           'password' => 'required',
       ]);

       User::create($credential);
       return redirect()->route('login')->with('success', 'Account created');
   }


}
