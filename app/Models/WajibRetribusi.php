<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WajibRetribusi extends Model
{
    use HasFactory;

    protected $table ='wajib_retribusi';
    protected $fillable = ['id_user','nama','nik','no_hp','alamat','id_kelurahan','status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan');
    }
}
