<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon; // <-- Impor baris ini di atas
use Illuminate\Support\Facades\View; // 1. Pastikan baris ini ada
use App\Models\Setting;              // 2. Pastikan baris ini ada
use Livewire\Livewire; // 1. Pastikan import Livewire ini ada di atas
use App\Http\Controllers\StrukturOrgController; // 2. Import class controller Anda

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Mengatur bahasa Carbon global menjadi Indonesia
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        View::share('setting', Setting::first());
        // Mengambil semua data banner dan mengubahnya menjadi format key-value: ['galeri' => 'path/foto.jpg', 'berita' => 'path/foto2.jpg']
    $banners = Setting::pluck('banner_image', 'halaman')->toArray();
    
    // Bagikan variabel $banners ke seluruh halaman web Anda
    View::share('banners', $banners);
            
    }
}
