<?php

namespace App\Http\Controllers\Retribusi;

use App\Http\Controllers\Controller;
use App\Models\WajibRetribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index(){
        $wajibRetribusi = WajibRetribusi::where('id_user', auth()->user()->id)->first();

        return view('Wajib-Retribusi.profil',compact('wajibRetribusi'));
    } 

    public function update(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:16',
            'alamat' => 'required|string|max:255',
        ]);
    
        $user = Auth::user();
    
        // Update username pada model user
        $user->username = $request->input('username');
        $user->save();
    
        // Update data pada model WajibRetribusi
        $wajibRetribusi = $user->wajibRetribusi;
    
        // Pastikan $wajibRetribusi tidak null sebelum diakses
        if ($wajibRetribusi) {
            $wajibRetribusi->nik = $request->input('nik');
            $wajibRetribusi->nama = $request->input('nama_lengkap');
            $wajibRetribusi->no_hp = $request->input('no_hp');
            $wajibRetribusi->alamat = $request->input('alamat');
            $wajibRetribusi->save(); // Simpan perubahan ke database
        }
    
        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
    
}