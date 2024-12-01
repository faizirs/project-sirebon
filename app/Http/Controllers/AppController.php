<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AppController extends Controller
{
    public function halamanLogin(){
        return view('auth.Login-aplikasi');
    }
    public function postLogin(Request $request){
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session()->put('session_user', $user);
            session()->flash('login_success', true);
    
            if ($user->level == 'superadmin') {
                return redirect()->route('kelola-user.index'); // Route untuk halaman superadmin
            } elseif ($user->level == 'admin') {
                return redirect()->route('home'); // Route untuk halaman admin
            } else {
                return redirect()->route('profil.index'); // Route untuk halaman retribusi
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
        'new_password' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',
            'regex:/[A-Z]/', 
            'regex:/[0-9]/', 
            'regex:/[@$!%*?&#]/',
            'confirmed',
        ],
        ], [
            'old_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru harus memiliki minimal 8 karakter.',
            'new_password.regex' => 'Password baru harus mengandung setidaknya satu huruf besar, satu huruf kecil, satu angka, dan satu karakter spesial (@$!%*?&#).',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Password lama salah']);
        }

        auth()->user()->update(['password' => Hash::make($request->new_password)]);

        return back()->with('status', 'Password berhasil diubah');
    }




}
