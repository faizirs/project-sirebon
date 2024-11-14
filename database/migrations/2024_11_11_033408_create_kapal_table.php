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
        Schema::create('kapal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_wajib_retribusi');
            $table->string('nama_pemilik', 100);
            $table->string('nama_kapal', 50);
            $table->unsignedBigInteger('id_jenis_kapal');
            $table->string('ukuran', 50);
            $table->timestamps();

            $table->foreign('id_wajib_retribusi')->references('id')->on('wajib_retribusi')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_jenis_kapal')->references('id')->on('ref_jenis_kapal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kapal');
    }
};
