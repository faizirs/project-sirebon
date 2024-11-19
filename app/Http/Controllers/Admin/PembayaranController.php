<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MsRekening;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('Admin.pembayaran', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ref_bank' => 'required',
            'no_rekening' => 'required',
            'nama_pemilik_rekening' => 'required',
            'biaya_retribusi' => 'required|numeric',
            'file_bukti' => 'required|file|mimes:jpg,png,jpeg,pdf'
        ]);
    
        // Simpan file bukti pembayaran
        $file_bukti = $request->file('file_bukti');
        $file_bukti->move(public_path('bukti_pembayaran'), $file_bukti->getClientOriginalName());
    
        // Simpan data ke database
        Pembayaran::create([
            'id_ref_bank' => $request->id_ref_bank,
            'no_rekening' => $request->no_rekening,
            'nama_pemilik_rekening' => $request->nama_pemilik_rekening,
            'biaya_retribusi' => $request->biaya_retribusi,
            'file_bukti' => $file_bukti->getClientOriginalName(),
        ]);
        MsRekening::create([
            'id_ref_bank' => $request->id_ref_bank,
            'no_rekening' => $request->no_rekening,
            'nama_akun' => $request->nama_pemilik_rekening
        ]);
        
    
        return redirect()->route('konfirmasi-pembayaran.index')->with('success', 'Data pembayaran berhasil disimpan');
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
