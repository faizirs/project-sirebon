<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanLogin(){
        return view('Login.Login-aplikasi');
    }
    public function postLogin(Request $request)
    {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->level == 'admin') {
            return redirect()->route('home');
        } elseif ($user->level == 'retribusi') {
            return redirect()->route('profil');
        }
    }

    return redirect()->route('login')->withErrors(['login_gagal' => 'Email atau password salah']);
}

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
