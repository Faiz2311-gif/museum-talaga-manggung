<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog - Museum & Arsip Sejarah</title>
    <!-- Menghubungkan aset CSS & JS lokal Laravel (Tailwind) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- Menggunakan latar belakang krem muda hangat -->
<body class="bg-amber-50 text-stone-900 antialiased font-sans min-h-screen flex flex-col">

    <!-- 1. BILAH NAVIGASI (NAVBAR) -->
    <header class="border-b border-amber-200 bg-white/80 backdrop-blur sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between gap-4">

            <!-- SISI KIRI: Logo Web -->
            <div class="flex items-center font-sans tracking-wide shrink-0">
                <a href="{{ url('/') }}" class="block hover:opacity-90 transition">
                    <img src="{{ Vite::asset('resources/images/image_ee43ecbd.svg') }}"
                         alt="Museum Talaga Manggung"
                         class="h-auto max-h-12 w-auto object-contain" />
                </a>
            </div>

            <!-- SISI KANAN: Menu Desktop -->
            <nav class="hidden md:flex items-center space-x-6 text-xs md:text-sm font-medium text-stone-600 whitespace-nowrap ml-auto">
                <a href="{{ url('/') }}" class="hover:text-amber-700 transition">Beranda</a>

                <!-- Dropdown Profil (Sudah Interaktif Klik) -->
                <div class="relative inline-block text-left">
                    <button onclick="toggleDropdown(event, 'menuProfil')" class="flex items-center hover:text-amber-700 transition gap-1 focus:outline-none">
                        Profil <span class="text-[9px]">▼</span>
                    </button>
                    <div id="menuProfil" class="absolute left-0 mt-2 w-48 bg-white border border-amber-200 rounded-lg shadow-xl opacity-0 invisible -translate-y-2 transform transition-all duration-300 ease-out z-50 overflow-hidden text-left dropdown-list">
    <a href="{{ route('sejarah') }}" class="block px-4 py-2.5 text-xs border-b border-amber-100 {{ request()->is('sejarah') ? 'bg-amber-100 text-amber-900 font-semibold' : 'text-stone-700 hover:bg-amber-50 hover:text-amber-800' }}">Sejarah</a>
    <a href="{{ route('visimisi') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Visi & Misi</a>
    <a href="{{ route('strukturorg') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800">Struktur Organisasi</a>
</div>
                </div>

                <!-- MENU AKTIF: Galeri berwarna amber -->
                <a href="{{ route('galeri') }}" class="hover:text-amber-700 transition">Katalog</a>
                <a href="{{ route('berita.index') }}" class="hover:text-amber-700 transition">Berita</a>

                <!-- Dropdown Living Museum (Sudah Interaktif Klik) -->
                <div class="relative inline-block text-left">
                    <button onclick="toggleDropdown(event, 'menuMuseum')" class="flex items-center hover:text-amber-700 transition gap-1 focus:outline-none">
                        Living Museum <span class="text-[9px]">▼</span>
                    </button>
                    <div id="menuMuseum" class="absolute left-0 mt-2 w-44 bg-white border border-amber-200 rounded-lg shadow-xl opacity-0 invisible -translate-y-2 transform transition-all duration-300 ease-out z-50 overflow-hidden text-left dropdown-list">
                        <a href="{{ route('walangsuji')}}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Walang Suji</a>
                        <a href="{{ route('gosali')}}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800">Gosali</a>
                    </div>
                </div>
            </nav>

            <!-- Tombol Menu Hamburger untuk HP -->
            <div class="flex items-center md:hidden">
                <button id="mobile-menu-button" type="button" class="text-stone-600 hover:text-amber-700 focus:outline-none p-2 rounded-md hover:bg-amber-50 transition" aria-label="Toggle menu">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- PANEL MENU SELULER -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-amber-100 bg-white px-6 py-4 space-y-3 text-sm font-medium text-stone-600 shadow-inner">
            <a href="{{ url('/') }}" class="block hover:text-amber-700 py-1 transition">Beranda</a>
            <div class="border-l-2 border-amber-200 pl-3 space-y-2 my-1">
                <span class="text-xs text-stone-400 uppercase tracking-wider block">Profil</span>
                <a href="{{ route('sejarah') }}" class="block text-amber-500 hover:text-amber-700 text-xs transition">Sejarah</a>
                <a href="{{ route('visimisi') }}" class="block hover:text-amber-700 text-xs transition">Visi & Misi</a>
                <a href="{{ route('strukturorg') }}" class="block hover:text-amber-700 text-xs transition">Struktur Organisasi</a>
            </div>
            <a href="{{ route('galeri') }}" class="block  hover:text-amber-700 py-1 transition">Katalog</a>
            <a href="{{ route('berita.index') }}" class="block hover:text-amber-700 py-1 transition">Berita</a>
            <div class="border-l-2 border-amber-200 pl-3 space-y-2 my-1">
                <span class="text-xs text-stone-400 uppercase tracking-wider block">Living Museum</span>
                <a href="{{route('walangsuji')}}" class="block hover:text-amber-700 text-xs transition">Walang Suji</a>
                <a href="{{route('gosali')}}" class="block hover:text-amber-700 text-xs transition">Gosali</a>
            </div>
        </div>
    </header>

<!-- 2. KONTEN UTAMA: HALAMAN SEJARAH DINAMIS -->
<main class="flex-grow max-w-4xl w-full mx-auto px-6 py-12 bg-[#fdfbf2] font-sans">
    
    <!-- Bagian Judul dan Abstrak Sejarah -->
    <div class="text-center mb-12 flex flex-col items-center" data-aos="fade-down" data-aos-duration="800">
        <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase">
            Profil Museum
        </span>
        <h1 class="text-3xl md:text-5xl font-black text-amber-800 tracking-tight leading-tight">
            {{ $sejarahData['sejarah_title'] ?? 'Sejarah Kerajaan Talaga Manggung' }}
        </h1>
        <p class="mt-4 text-stone-600 text-sm md:text-base leading-relaxed max-w-2xl italic">
            "{{ $sejarahData['sejarah_subtitle'] ?? 'Menelusuri jejak luhur peradaban, titisan benda pusaka, dan kronik kegemilangan masa lalu institusi.' }}"
        </p>
        <div class="h-0.5 w-16 bg-amber-600 rounded-full mt-6"></div>
    </div>

    <!-- Wadah Artikel Narasi Panjang -->
    <div class="bg-white border border-amber-200/60 rounded-2xl p-8 md:p-10 shadow-sm text-stone-700 text-sm leading-relaxed tracking-wide text-justify space-y-6" 
         data-aos="fade-up" 
         data-aos-duration="1000" 
         data-aos-delay="200">
        
        <!-- Gambar Utama Sejarah (Ditambahkan secara kondisional) -->
        @if(!empty($sejarahData['sejarah_image']))
            <div class="w-full mb-8 overflow-hidden rounded-xl border border-amber-200/40 shadow-sm">
                <img src="{{ asset('storage/' . $sejarahData['sejarah_image']) }}" 
                     alt="{{ $sejarahData['sejarah_title'] ?? 'Gambar Sejarah' }}" 
                     class="w-full h-auto max-h-[450px] object-cover transition-transform duration-700 hover:scale-105">
            </div>
        @endif
        
        <!-- Paragraf Utama / Pembuka -->
        <p class="whitespace-pre-line first-letter:text-4xl first-letter:font-black first-letter:text-amber-700 first-letter:mr-2 first-letter:float-left">
            {{ $sejarahData['sejarah_body_1'] ?? 'Narasi teks dokumen sejarah utama belum diisi oleh pengelola admin museum. Silakan masuk ke panel dashboard admin untuk memperbarui isi catatan sejarah Kerajaan Talaga Manggung secara berkala.' }}
        </p>

        <!-- Paragraf Lanjutan -->
        @if(!empty($sejarahData['sejarah_body_2']))
            <p class="whitespace-pre-line pt-4 border-t border-stone-100">
                {{ $sejarahData['sejarah_body_2'] }}
            </p>
        @endif
    </div>

</main>





            <!-- Item Foto 3 -->
<x-site-footer />

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    });

    function toggleDropdown(event, menuId) {
    event.stopPropagation();

    const targetMenu = document.getElementById(menuId);

    // Ambil semua elemen dropdown yang ada di halaman
    const allMenus = document.querySelectorAll('.dropdown-list');

    // Tutup semua dropdown lain terlebih dahulu
    allMenus.forEach(menu => {
        if (menu !== targetMenu) {
            menu.classList.add('opacity-0', 'invisible', '-translate-y-2');
            menu.classList.remove('opacity-100', 'visible', 'translate-y-0');
        }
    });

    // Toggle dropdown yang sedang diklik
    targetMenu.classList.toggle('opacity-0');
    targetMenu.classList.toggle('invisible');
    targetMenu.classList.toggle('-translate-y-2');

    targetMenu.classList.toggle('opacity-100');
    targetMenu.classList.toggle('visible');
    targetMenu.classList.toggle('translate-y-0');
}

// Menutup semua dropdown jika klik di luar area menu
window.addEventListener('click', function() {
    const allMenus = document.querySelectorAll('.dropdown-list');

    allMenus.forEach(menu => {
        menu.classList.add('opacity-0', 'invisible', '-translate-y-2');
        menu.classList.remove('opacity-100', 'visible', 'translate-y-0');
    });
});
</script>
