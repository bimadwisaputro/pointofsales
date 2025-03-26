<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // $email = $request->email;
        // $password = $request->password;
        $credential = $request->only('email', 'password');
        // Auth : class dari laravel
        if (Auth::attempt($credential)) {
            return redirect('dashboard')->with('success', 'Success Login');
        } else {
            return back()->withErrors(['email' => 'Please check your credentials'])->withInput();
        }
    }
}
