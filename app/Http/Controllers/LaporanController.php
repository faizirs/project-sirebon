<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class LaporanController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('laporan.index', compact('pembayaran'));
    }

    public function exportPdf()
    {
        $pembayaran = Pembayaran::all();
        $pdf = Pdf::loadView('laporan.pdf', compact('pembayaran'));
        return $pdf->download('laporan_pembayaran.pdf');
    }

    public function exportDocx()
    {
        $pembayaran = Pembayaran::all();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Header
        $section->addText('Laporan Pembayaran Retribusi', ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $section->addTextBreak(1);

        // Table
        $table = $section->addTable();
        $table->addRow();
        $table->addCell()->addText('No.');
        $table->addCell()->addText('Nama Pemilik Rekening');
        $table->addCell()->addText('Nomor Rekening');
        $table->addCell()->addText('Tanggal Bayar');
        $table->addCell()->addText('Bukti Pembayaran');

        foreach ($pembayaran as $index => $data) {
            $table->addRow();
            $table->addCell()->addText($index + 1);
            $table->addCell()->addText($data->nama_pemilik_rekening);
            $table->addCell()->addText($data->no_rekening);
            $table->addCell()->addText($data->created_at->format('d-m-Y'));
            $table->addCell()->addText($data->file_bukti);
        }

        // Export file
        $fileName = 'Laporan_Pembayaran_Retribusi.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
