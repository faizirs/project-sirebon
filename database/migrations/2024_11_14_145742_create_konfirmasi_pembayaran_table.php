<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('konfirmasi_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_ms_rekening');
            $table->unsignedBigInteger('id_ref_bank');
            $table->string('nama_pemilik_rekening', 50);
            $table->string('no_rekening_pemilik', 25)->unique();
            $table->string('file_bukti');
            $table->date('tgl_bayar');
            $table->char('status', 1)->default('P');
            $table->timestamp('tindaklanjut_tgl')->nullable();
            $table->string('tindaklanjut_user', 30)->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ms_rekening')->references('id')->on('ms_rekening')->onDelete('cascade');
            $table->foreign('id_ref_bank')->references('id')->on('ref_bank')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfirmasi_pembayaran');
    }
};
