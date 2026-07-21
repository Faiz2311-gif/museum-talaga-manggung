<?php

namespace App\Http\Controllers;

use App\Models\HomeCard;
use App\Models\GosaliVideo;
use App\Models\Position;
use App\Models\Visimisi;
use App\Models\WalangSujiVideo;
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

        $footerCol1Title = \App\Models\HomeSection::value('footer_col1_title', 'Museum Talaga Manggung');
        $footerCol1Text = \App\Models\HomeSection::value('footer_col1_text', 'Wadah pelestarian benda pusaka, manuskrip kuno, dan rekam jejak sejarah peradaban institusi.');
        $footerCol1Copyright = \App\Models\HomeSection::value('footer_col1_copyright', '© 2026 Hak Cipta Dilindungi.');
        $footerCol2Title = \App\Models\HomeSection::value('footer_col2_title', 'Akses Pintasan');
        $footerCol2Links = \App\Models\HomeSection::value('footer_col2_links', "Beranda|/\nBerita|/berita\nGaleri|/galeri");
        $footerCol3Title = \App\Models\HomeSection::value('footer_col3_title', 'Informasi Hukum');
        $footerCol3Links = \App\Models\HomeSection::value('footer_col3_links', "Kebijakan Privasi|#\nSyarat & Ketentuan Penggunaan|#\nBantuan & Kontak Resmi|#");

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
            'cardsSectionDescription',
            'footerCol1Title',
            'footerCol1Text',
            'footerCol1Copyright',
            'footerCol2Title',
            'footerCol2Links',
            'footerCol3Title',
            'footerCol3Links'
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
        $visimisi = Visimisi::first();

        $visimisiData = $visimisi ? [
            'visimisi_title' => $visimisi->title,
            'visimisi_subtitle' => $visimisi->subtitle,
            'visimisi_image' => $visimisi->image,
            'visimisi_visi' => $visimisi->visi,
            'visimisi_misi' => $visimisi->misi,
        ] : [];

        return view('visimisi', compact('visimisiData'));
    }

public function strukturorg()
{
    // KOREKSI UTAMA: Ambil data tunggal bermerek 'Global' dari database
    $struktur = Position::where('title', 'Global')->first();

    // Lempar variabel $struktur ke dalam file Blade publik Anda
    return view('strukturorg', compact('struktur'));
}


    public function walangsuji()
    {
        $videos = WalangSujiVideo::orderBy('sort_order')->orderBy('id')->get();

        return view('walangsuji', compact('videos'));
    }

    public function gosali()
    {
        $videos = GosaliVideo::orderBy('sort_order')->orderBy('id')->get();

        return view('gosali', compact('videos'));
    }
}
