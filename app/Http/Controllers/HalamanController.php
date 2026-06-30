<?php

namespace App\Http\Controllers;

use App\Models\HomeCard; // <-- WAJIB TAMBAHKAN BARIS INI
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index()
    {
        $homeCards = HomeCard::orderBy('order_weight', 'asc')->get();
        $heroBadge = \App\Models\HomeSection::value('hero_badge', 'Sistem Profil Museum V1.0');
        $heroTitle = \App\Models\HomeSection::value('hero_title', 'Melestarikan Sejarah Lewat Arsip Digital');
        $heroDescription = \App\Models\HomeSection::value('hero_description', 'Selamat datang di konsep portal digital museum kami.');
        $heroPrimaryButton = \App\Models\HomeSection::value('hero_primary_button', 'Jelajahi Galeri');
        $heroSecondaryButton = \App\Models\HomeSection::value('hero_secondary_button', 'Latar Belakang Instansi');
        $aboutTitle = \App\Models\HomeSection::value('about_title', 'Tentang Lembaga Kami');
        $aboutDescription = \App\Models\HomeSection::value('about_description', 'Portal web ini berfungsi sebagai wadah visual untuk menyajikan koleksi pameran.');
        $cardsSectionTitle = \App\Models\HomeSection::value('cards_section_title', 'Koleksi Unggulan');
        $cardsSectionDescription = \App\Models\HomeSection::value('cards_section_description', 'Pilih bagian yang ingin Anda jelajahi dari halaman beranda ini.');

        return view('welcome', compact(
            'homeCards',
            'heroBadge',
            'heroTitle',
            'heroDescription',
            'heroPrimaryButton',
            'heroSecondaryButton',
            'aboutTitle',
            'aboutDescription',
            'cardsSectionTitle',
            'cardsSectionDescription'
        ));
    }

    public function kegiatan()
    {
        return view('kegiatan'); // Mengarah ke views/profil.blade.php
    }

    public function berita()
    {
        return view('berita'); // Mengarah ke views/berita.blade.php
    }

    public function galeri()
    {
        return view('galeri'); // Mengarah ke views/galeri.blade.php
    }

    public function sejarah()
{
    try {
        // Mencoba mengambil data dengan kolom standar 'content'
        $sejarahData = \DB::table('sections')
            ->where('page', 'sejarah')
            ->pluck('content', 'key')
            ->toArray();
    } catch (\Exception $e) {
        // Fallback: Jika kolom 'content' tidak ada, coba pakai kolom 'isi' atau kembalikan array kosong
        try {
            $sejarahData = \DB::table('sections')
                ->where('page', 'sejarah')
                ->pluck('isi', 'key')
                ->toArray();
        } catch (\Exception $ex) {
            $sejarahData = [];
        }
    }

    return view('sejarah', compact('sejarahData'));
}


    public function visimisi()
    {
        return view('visimisi');
    }

    public function strukturorg()
    {
        return view('strukturorg');
    }

    public function walangsuji()
    {
        return view('walangsuji');
    }

    public function gosali()
    {
        return view('gosali');
    }
}
