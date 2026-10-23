<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman Utama / Dashboard Admin
Route::get('/admin', function () {
    return view('admin');
});

// Halaman Data User
Route::get('/admin/users', function () {
    return view('users');
});

// Halaman Jadwal
Route::get('/admin/jadwal', function () {
    return view('jadwal');
});

// Halaman Pengajuan Bimbingan
Route::get('/admin/pengajuan', function () {
    return view('pengajuan');
});

// Halaman Laporan
Route::get('/admin/laporan', function () {
    return view('laporan');
});

// Halaman Notifikasi
Route::get('/admin/notifikasi', function () {
    return view('notifikasi');
});

// Halaman Pengaturan
Route::get('/admin/pengaturan', function () {
    return view('pengaturan');
});