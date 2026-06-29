<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;


// Halaman Utama Publik
Route::view('/', 'welcome');

// Route untuk halaman berita
Route::get('/berita', [HalamanController::class, 'berita'])->name('berita');

// Route untuk halaman galeri publik
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/{galeri}', [GaleriController::class, 'show'])->name('galeri.show');

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
    Route::get('galeri-admin', [App\Http\Controllers\GaleriController::class, 'adminIndex'])
    ->middleware(['auth', 'verified'])
    ->name('admin.galeri.index');

// 4. BARU: Rute otomatis untuk seluruh fungsi CRUD Galeri Admin (Terhubung ke GaleriController)
// URL otomatis menjadi: /admin/galeri, /admin/galeri/create, dll.
Route::resource('galeri', App\Http\Controllers\GaleriController::class)
    ->names([
        'index'   => 'admin.galeri.index',
        'create'  => 'admin.galeri.create',
        'store'   => 'admin.galeri.store',
        'edit'    => 'admin.galeri.edit',
        'update'  => 'admin.galeri.update',
        'destroy' => 'admin.galeri.destroy',
    ])
    ->middleware(['auth', 'verified']);

    // Mengarah ke Controller untuk menangani tampilan tabel CRUD berita admin
Route::get('berita-admin', [App\Http\Controllers\BeritaController::class, 'adminIndex'])
    ->middleware(['auth', 'verified'])
    ->name('admin.berita.index');

    // 10. Rute otomatis untuk seluruh fungsi CRUD Berita Admin
    // URL otomatis menjadi: /admin/berita, /admin/berita/create, dll.
    Route::resource('berita', App\Http\Controllers\BeritaController::class)
        ->middleware(['verified']);

    // 5. Rute Placeholder Dinamis untuk Menu Lain yang Belum Dibuat Filenya
    Route::get('modul/{menu}', function ($menu) {
        $namaMenu = ucwords(str_replace('-', ' ', $menu));
        return view('admin.placeholder', compact('namaMenu', 'menu'));
    })->name('admin.modul');

}); // Akhir dari Grup Route Admin

require __DIR__.'/auth.php';
