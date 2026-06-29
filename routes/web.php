<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\BeritaController;

// Halaman Utama Publik
Route::view('/', 'welcome');

// Route untuk halaman berita
Route::get('/berita', [HalamanController::class, 'berita'])->name('berita');

// Route untuk halaman kegiatan
Route::get('/kegiatan', [HalamanController::class, 'kegiatan'])->name('kegiatan');

// Route untuk halaman galeri
Route::get('/galeri', [HalamanController::class, 'galeri'])->name('galeri');

Route::get('/sejarah', [HalamanController::class, 'sejarah'])->name('sejarah');

Route::get('/visimisi', [HalamanController::class, 'visimisi'])->name('visimisi');

Route::get('/strukturorg', [HalamanController::class, 'strukturorg'])->name('strukturorg');

Route::get('/walangsuji', [HalamanController::class, 'walangsuji'])->name('walangsuji');

Route::get('/gosali', [HalamanController::class, 'gosali'])->name('gosali');

// Rute otomatis untuk seluruh fungsi CRUD
Route::resource('/berita', BeritaController::class);

// Grup Route Admin (Otomatis menggunakan awalan url /admin)
Route::prefix('admin')->middleware(['auth'])->group(function () {

    // 1. Mengarah ke views/admin/dashboard.blade.php
    Route::view('dashboard', 'admin.dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    // 2. Mengarah ke views/admin/profile.blade.php
    Route::view('profile', 'admin.profile')
        ->name('profile');

    // 3. Mengarah ke views/admin/adm-beranda.blade.php (Halaman Baru Anda)
    Route::view('beranda', 'admin.admberanda')
    ->middleware(['verified'])
    ->name('admin.beranda');

    // 4. Mengarah ke views/admin/admsejarah.blade.php (Halaman Sejarah Admin)
    Route::view('sejarah', 'admin.admsejarah')
        ->middleware(['verified'])
        ->name('admin.sejarah');

    // 5. Mengarah ke views/admin/admvisimisi.blade.php (Halaman Visi & Misi Admin)
    Route::view('visimisi', 'admin.admvisimisi')
        ->middleware(['verified'])
        ->name('admin.visimisi');

    // 6. Mengarah ke views/admin/admstog.blade.php (Halaman Struktur Organisasi Admin)
    Route::view('strukturorg', 'admin.admstog')
        ->middleware(['verified'])
        ->name('admin.strukturorg');

    // 7. Mengarah ke views/admin/admgaleri.blade.php (Halaman Galeri Admin)
    Route::view('galeri', 'admin.admgaleri')
        ->middleware(['verified'])
        ->name('admin.galeri');

    // 8. Mengarah ke views/admin/admberita.blade.php (Halaman Berita Admin)
    Route::view('berita-admin', 'admin.admberita')
        ->middleware(['verified'])
        ->name('admin.berita-admin');

    // 9. Mengarah ke views/admin/admkegiatan.blade.php (Halaman Kegiatan Admin)
    Route::view('kegiatan-admin', 'admin.admkegiatan')
        ->middleware(['verified'])
        ->name('admin.kegiatan-admin');

    // 10. Rute otomatis untuk seluruh fungsi CRUD Berita Admin
    // URL otomatis menjadi: /admin/berita, /admin/berita/create, dll.
    Route::resource('berita', App\Http\Controllers\BeritaController::class);

    // 5. Rute Placeholder Dinamis untuk Menu Lain yang Belum Dibuat Filenya
    Route::get('modul/{menu}', function ($menu) {
        $namaMenu = ucwords(str_replace('-', ' ', $menu));
        return view('admin.placeholder', compact('namaMenu', 'menu'));
    })->name('admin.modul');

}); // Akhir dari Grup Route Admin

require __DIR__.'/auth.php';
