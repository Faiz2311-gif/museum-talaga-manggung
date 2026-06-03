<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;

// Halaman Utama Publik
Route::view('/', 'welcome');

// Route untuk halaman berita
Route::get('/berita', [HalamanController::class, 'berita'])->name('berita');

// Route untuk halaman kegiatan
Route::get('/kegiatan', [HalamanController::class, 'kegiatan'])->name('kegiatan');

// Route untuk halaman galeri
Route::get('/galeri', [HalamanController::class, 'galeri'])->name('galeri');

// Grup Route Admin (Otomatis menggunakan awalan url /admin)
Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Mengarah ke views/admin/dashboard.blade.php
    Route::view('dashboard', 'admin.dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    // Mengarah ke views/admin/profile.blade.php
    Route::view('profile', 'admin.profile')
        ->name('profile');

});

require __DIR__.'/auth.php';
