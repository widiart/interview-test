<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\models\User;

class AuthController extends Controller
{
    
    public function register() 
    {
        return view('auth.register');
    }

    public function login() 
    {
        return view('auth.login');
    }

    public function logout(Request $request) 
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function login_action(Request $request) 
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin');
        }
 
        return back()->withErrors([
            'email' => 'Email atau password anda salah.',
        ])->onlyInput('email');
    }

    public function register_action(Request $request) 
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
 
        User::create($credentials);
        return redirect('/login')->with('success', 'Registration Succesfull! Please Login');
    }

}
