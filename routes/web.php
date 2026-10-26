<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/', function () {
    return view('landingpage');
});

// Route untuk halaman login (bisa menggunakan view blade yang memuat komponen React login)
Route::get('/login', function () {
    return view('landingpage'); // atau view khusus login.blade.php
});