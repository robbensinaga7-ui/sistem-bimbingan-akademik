<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = 'konsultasis';
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'nama_dosen',
        'topik',
        'waktu_konsultasi',
        'tanggal',
        'status' // Menunggu, Disetujui, Ditolak, Selesai
    ];
}