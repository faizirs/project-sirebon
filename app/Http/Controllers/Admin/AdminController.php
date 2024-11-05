<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.home');
    }
    public function profil(){
        return view('Wajib-Retribusi.profil');
    }

    public function showProfile(){
        
        return view('Admin.my-profile');
    }
}
