<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiBayar extends Model
{
    use HasFactory;

    protected $table = 'konfirmasi_pembayaran';
    protected $fillable = [
        'id_user',
        'id_ms_rekening',
        'id_ref_bank',
        'nama_pemilik_rekening',
        'no_rekening_pemilik',
        'file_bukti',
        'tgl_bayar',
        'status',
        'tindaklanjut_tgl',
        'tindaklanjut_user'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function msRekening() {
        return $this->belongsTo(MsRekening::class, 'id_ms_rekening');
    }

    public function refBank() {
        return $this->belongsTo(RefBank::class, 'id_ref_bank');
    }
}
