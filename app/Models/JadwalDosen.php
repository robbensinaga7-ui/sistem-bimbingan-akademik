<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDosen extends Model
{
    use HasFactory;

    protected $table = 'jadwal_dosens';
    
    protected $fillable = [
        'nama_dosen',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruang',
        'topik',
        'status'
    ];
}