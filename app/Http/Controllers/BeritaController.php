<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Menampilkan daftar berita di halaman utama
    public function index()
    {
        // Ambil semua berita, urutkan dari yang terbaru
        $berita = Berita::orderBy('tanggal_publikasi', 'desc')->get();

        // Kirim data ke file view bernama 'berita.index'
        return view('berita', compact('berita'));
    }
}
