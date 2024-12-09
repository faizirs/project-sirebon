<?php

namespace App\Http\Controllers\Retribusi;

use App\Http\Controllers\Controller;
use App\Models\Kapal;
use App\Models\RefJenisKapal;
use App\Models\WajibRetribusi;
use Illuminate\Http\Request;

class KapalkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $kapal = Kapal::with('wajibRetribusi')
        ->where('id_user', auth()->id())
        ->get();

    return view('wajib-retribusi.kapalku', compact('kapal'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jeniskapal = RefJenisKapal::all();
        $pemilik = auth()->user()->wajibRetribusi;
        return view('wajib-retribusi.Kapalku.create', compact('jeniskapal', 'pemilik'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_kapal' => 'required|string|max:50',
        'id_jenis_kapal' => 'required|exists:ref_jenis_kapal,id',
        'ukuran' => 'required|string|max:50',
    ]);

    $wajibRetribusi = auth()->user()->wajibRetribusi; // Ambil data wajib retribusi dari user yang sedang login

    Kapal::create([
        'id_user' => auth()->id(),
        'id_wajib_retribusi' => $wajibRetribusi->id,
        'nama_pemilik' => $wajibRetribusi->nama, // Pastikan nama pemilik diambil dari relasi
        'nama_kapal' => $request->nama_kapal,
        'id_jenis_kapal' => $request->id_jenis_kapal,
        'ukuran' => $request->ukuran,
        'tanggal_pembayaran' => now()->addMonth()->format('Y-m-d'), // Tambah 1 bulan dari sekarang
    ]);

    return redirect()->route('kapalku.index')->with('success', 'Data kapal berhasil ditambahkan');
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
    $kapal = Kapal::where('id', $id)
        ->where('id_user', auth()->id()) // Pastikan hanya data milik user yang login
        ->firstOrFail();
    $jeniskapal = RefJenisKapal::all();
    $pemilik = auth()->user()->wajibRetribusi; // Ambil data pemilik dari relasi

    return view('wajib-retribusi.Kapalku.edit', compact('kapal', 'jeniskapal', 'pemilik'));
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'nama_kapal' => 'required|string|max:50',
        'id_jenis_kapal' => 'required|exists:ref_jenis_kapal,id',
        'ukuran' => 'required|string|max:50',
    ]);

    $kapal = Kapal::where('id', $id)
        ->where('id_user', auth()->id()) // Pastikan hanya data milik user yang login
        ->firstOrFail();

    $kapal->update([
        'nama_kapal' => $request->nama_kapal,
        'id_jenis_kapal' => $request->id_jenis_kapal,
        'ukuran' => $request->ukuran,
    ]);

    return redirect()->route('kapalku.index')->with('success', 'Data kapal berhasil diubah');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kapal = Kapal::where('id', $id)
            ->where('id_user', auth()->id()) // Hanya data milik user yang sedang login
            ->firstOrFail();

        $kapal->delete();
        return redirect()->route('kapalku.index')->with('success', 'Data kapal berhasil dihapus');
    }

}