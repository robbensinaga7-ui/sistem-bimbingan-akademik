<?php

use Illuminate\Support\Facades\Route;

// Halaman Utama / Landing Page
Route::get('/', function () {
    return view('landingpage');
});

// Halaman Dashboard Admin
Route::get('/admin', function () {
    return view('admin');
});

// Halaman Users Admin
Route::get('/admin/users', function () {
    return view('users');
});