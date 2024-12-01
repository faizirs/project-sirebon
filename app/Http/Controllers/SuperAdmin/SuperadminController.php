<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use App\Models\User;
use App\Models\WajibRetribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('wajibRetribusi')->get();
        return view('SuperAdmin.kelola-user.index', compact('users'));
    }

    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('SuperAdmin.kelola-user.create', compact('kelurahan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|min:6',
            'level' => 'required|in:admin,retribusi',
            'id_user_group' => 'required|integer',
        ]);        

        // Buat User
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_user_group' => $request->id_user_group,
            'remember_token' => Str::random(60),
        ]);

        if ($request->level === 'retribusi') {
            $request->validate([
                'nama' => 'required|string|max:50',
                'no_hp' => 'required|string|max:16',
                'nik' => 'required|string|max:16',
                'alamat' => 'required|string',
                'id_kelurahan' => 'required|exists:kelurahan,id',
                'status' => 'required|in:A,B',
    
            ]);
            WajibRetribusi::create([
                'id_user' => $user->id,
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'id_kelurahan' => $request->id_kelurahan,
                'status' => $request->status,
                
            ]);
            
        }

        return redirect()->route('kelola-user.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
