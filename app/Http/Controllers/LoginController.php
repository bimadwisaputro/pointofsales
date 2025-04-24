<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // $email = $request->email;
        // $password = $request->password;
        $credentials = $request->only('email', 'password');
        // Auth : class
        if (Auth::attempt($credentials)) {
            // return 'adwdawd';
            $roles = Auth::user()->roles->pluck('name')->toArray();
            // Simpan roles ke dalam session
            session(['session_roles' => $roles]);
            //return $roles;
            Alert::success('Welcome ! ', 'Anda berhasil masuk!');
            return redirect('dashboard')->with('success', 'Success Login');
        } else {
            // return 'adwdawd2222222';
            Alert::toast('Email atau kata sandi salah!', 'error');
            return back()->withErrors(['email' => 'Please check your credentials'])->withInput();
        }
    }



    public function logout()
    {
        Auth::logout();
        Alert::toast('Anda berhasil keluar!', 'success');
        return redirect()->to('login');
    }
}
