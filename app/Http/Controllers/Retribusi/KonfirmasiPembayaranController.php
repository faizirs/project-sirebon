<?php

namespace App\Http\Controllers\Retribusi;

use App\Http\Controllers\Controller;
use App\Models\Kapal;
use App\Models\KonfirmasiBayar;
use App\Models\MsRekening;
use App\Models\RefBank;
use App\Models\RefJenisKapal;
use App\Models\WajibRetribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonfirmasiPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        // Cari data wajib retribusi yang terkait dengan user yang login
        $wajibRetribusi = WajibRetribusi::where('id_user', $userId)->first();

        // Pastikan data wajib retribusi ditemukan
        if ($wajibRetribusi) {
            // Cari data kapal yang terkait dengan wajib retribusi ini
            $kapal = Kapal::where('id_wajib_retribusi', $wajibRetribusi->id)->first();

            // Ambil biaya retribusi dari jenis kapal yang terkait dengan kapal ini
            $biayaRetribusi = $kapal ? RefJenisKapal::where('id', $kapal->id_jenis_kapal)->value('biaya_retribusi') : 0;
        } else {
            $biayaRetribusi = 0;
        }

        $banks = RefBank::all();

        return view('Wajib-Retribusi.konfirmasi-pembayaran', compact('biayaRetribusi', 'banks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $banks = RefBank::all();
        $rekening = MsRekening::where('id_user', Auth::id())->get();
        return view('konfirmasi-pembayaran.create', compact('banks', 'rekening'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ref_bank' => 'required|exists:ref_bank,id',
            'id_ms_rekening' => 'required|exists:ms_rekening,id',
            'tgl_bayar' => 'required|date',
            'file_bukti' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $filePath = $request->file('file_bukti')->store('bukti_pembayaran', 'public');

        KonfirmasiBayar::create([
            'id_user' => Auth::id(),
            'id_ref_bank' => $request->id_ref_bank,
            'id_ms_rekening' => $request->id_ms_rekening,
            'nama_pemilik_rekening' => Auth::user()->name,
            'no_rekening_pemilik' => MsRekening::find($request->id_ms_rekening)->no_rekening,
            'file_bukti' => $filePath,
            'tgl_bayar' => $request->tgl_bayar,
        ]);

        return redirect()->route('konfirmasi-pembayaran.index')->with('success', 'Konfirmasi pembayaran berhasil dikirim');
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
