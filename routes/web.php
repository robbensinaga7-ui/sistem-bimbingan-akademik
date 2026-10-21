<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/', function () {
    return view('landingpage');
});

<<<<<<< HEAD
// Halaman Dashboard Admin
Route::get('/admin', function () {
    return view('admin');
});

// Halaman Users Admin
Route::get('/admin/users', function () {
    return view('users');
=======
// Route untuk halaman login (bisa menggunakan view blade yang memuat komponen React login)
Route::get('/login', function () {
    return view('landingpage'); // atau view khusus login.blade.php
>>>>>>> ddef4fe40cd939a8e023a682113b973cdd40678e
});