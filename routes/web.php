<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. AUTHENTICATION ROUTES (LOGIN & LOGOUT)
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// ==========================================
// 2. ADMIN DASHBOARD & MANAGEMENT ROUTES
// ==========================================
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/users', [UserAccountController::class, 'index'])->name('admin.users');
Route::post('/admin/users', [UserAccountController::class, 'store'])->name('users.store');
Route::delete('/admin/users/{id}', [UserAccountController::class, 'destroy'])->name('users.destroy');

// PERBAIKAN: Hubungkan ke AdminController agar data jadwal dosen tampil di admin
Route::get('/admin/jadwal', [AdminController::class, 'jadwalIndex'])->name('admin.jadwal');


Route::get('/admin/laporan', [AdminController::class, 'laporanIndex'])->name('admin.laporan');

Route::get('/admin/notifikasi', function () {
    return view('notifikasi');
})->name('admin.notifikasi');
Route::get('/admin/pengajuan', [AdminController::class, 'pengajuanIndex'])->name('admin.pengajuan');
Route::put('/admin/pengajuan/{id}', [AdminController::class, 'pengajuanUpdate'])->name('admin.pengajuan.update');
Route::delete('/admin/pengajuan/{id}', [AdminController::class, 'pengajuanDestroy'])->name('admin.pengajuan.destroy');
Route::get('/admin/pengaturan', function () {
    return view('pengaturan');
})->name('admin.pengaturan');


// ==========================================
// 3. DOSEN DASHBOARD ROUTES
// ==========================================
Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.dashboard');
Route::get('/dosen/jadwal', [DosenController::class, 'jadwalIndex'])->name('dosen.jadwal');
Route::post('/dosen/jadwal', [DosenController::class, 'jadwalStore'])->name('dosen.jadwal.store');
Route::put('/dosen/jadwal/{id}', [DosenController::class, 'jadwalUpdate'])->name('dosen.jadwal.update'); // <-- Tambahkan ini
Route::delete('/dosen/jadwal/{id}', [DosenController::class, 'jadwalDestroy'])->name('dosen.jadwal.destroy');
Route::get('/dosen/pengajuan', [DosenController::class, 'pengajuanIndex'])->name('dosen.pengajuan');
Route::put('/dosen/pengajuan/{id}', [DosenController::class, 'updateStatus'])->name('dosen.pengajuan.update');
Route::get('/dosen/catatan', [DosenController::class, 'catatanIndex'])->name('dosen.catatan');


// ==========================================
// 4. STUDENT / MAHASISWA DASHBOARD ROUTES
// ==========================================
Route::get('/student', [StudentController::class, 'index'])->name('student.dashboard');
Route::post('/student/konsultasi', [StudentController::class, 'store'])->name('student.konsultasi.store');

// PERBAIKAN: Hubungkan URL /student/... ke StudentController agar data jadwal dosen muncul di mahasiswa
Route::get('/mahasiswa/daftar-bimbingan', [StudentController::class, 'daftarBimbingan'])->name('mahasiswa.daftar-bimbingan');
Route::get('/mahasiswa/jadwal', [StudentController::class, 'jadwalSaya'])->name('mahasiswa.jadwal');
Route::get('/mahasiswa/status-pengajuan', [StudentController::class, 'statusPengajuan'])->name('mahasiswa.status-pengajuan');
Route::get('/mahasiswa/notifikasi', [StudentController::class, 'notifikasi'])->name('mahasiswa.notifikasi');
Route::delete('/mahasiswa/pengajuan/{id}', [StudentController::class, 'batalPengajuan'])->name('mahasiswa.pengajuan.batal');

// ==========================================
// 5. LANDING PAGE UTAMA & WILDCARD REACT (PALING BAWAH)
// ==========================================
Route::get('/', function () {
    return view('welcome');
});

// Wildcard React ditaruh paling bawah agar tidak mencaplok rute /login, /admin, /dosen, /student, dll
Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '.*');