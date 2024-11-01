<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AppController extends Controller
{
    public function halamanLogin(){
        return view('auth.Login-aplikasi');
    }
    public function postLogin(Request $request){
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

    public function showChangePasswordForm() {
        return view('auth.change-password');
    }

    public function updatePassword(Request $request)
    {   
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Password lama salah']);
        }
        auth()->user()->update(['password' => Hash::make($request->new_password)]);

    return back()->with('status', 'Password berhasil diubah');
    }

    public function showProfile(){
    session(['previous_url' => url()->previous()]);
    
    return view('auth.profile');
}

}
