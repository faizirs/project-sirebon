<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class LaporanController extends Controller
{
    public function index()
{
    // Ambil user yang sedang login
    $user = Auth::user();

    // Periksa peran pengguna
    if ($user->level === 'admin') {
        // Jika admin, ambil semua data pembayaran
        $pembayaran = Pembayaran::all();
    } else {
        // Jika bukan admin (misalnya retribusi), ambil data berdasarkan id_user
        $pembayaran = Pembayaran::where('id_user', auth()->id())
        ->get();
    }

    // Kirim data ke view
    return view('laporan.index', compact('pembayaran'));
}


    public function exportPdf()
    {
        $user = Auth::user();

        if ($user->level === 'admin') {
            $pembayaran = Pembayaran::all();
        } else {
            $pembayaran = Pembayaran::where('id_user', $user->id)->get();
        }

        $pdf = Pdf::loadView('laporan.pdf', compact('pembayaran'));
        return $pdf->download('laporan_pembayaran.pdf');
    }


}
