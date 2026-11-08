<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('nama_dosen');
            $table->string('topik');
            $table->string('waktu_konsultasi'); // <-- Diubah dari dateTime menjadi string
            $table->date('tanggal')->nullable(); // <-- Ditambahkan agar aman jika controller masih mengirim tanggal
            $table->string('status')->default('menunggu'); // menunggu, diterima, selesai, ditolak
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};