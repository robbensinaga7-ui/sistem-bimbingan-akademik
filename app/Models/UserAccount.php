<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan kolom-kolom diisi secara massal
    protected $fillable = [
        'nama',
        'nim_nidn',
        'role',
        'password',
    ];
}
