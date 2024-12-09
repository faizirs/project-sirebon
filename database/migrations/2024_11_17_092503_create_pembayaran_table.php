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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ref_bank');
            $table->unsignedBigInteger('id_user');
            $table->string('no_rekening')->unique();
            $table->string('nama_pemilik_rekening');
            $table->decimal('biaya_retribusi', 15, 2);
            $table->string('file_bukti');
            $table->char('status', 1)->default('P');
            $table->date('tanggal_tindak_lanjut')->nullable();
            $table->string('tindak_lanjut_user')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
