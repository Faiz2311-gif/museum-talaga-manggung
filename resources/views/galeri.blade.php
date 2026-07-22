<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Museum & Arsip Sejarah</title>
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
                        <a href="{{ route('sejarah') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Sejarah</a>
                        <a href="{{ route('visimisi') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Visi & Misi</a>
                        <a href="{{ route('strukturorg') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800">Struktur Organisasi</a>
                    </div>
                </div>

                <!-- MENU AKTIF: Galeri berwarna amber -->
                <a href="{{ route('galeri') }}" class="text-amber-500 hover:text-amber-700 transition">Katalog</a>
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
                <a href="{{ route('sejarah') }}" class="block hover:text-amber-700 text-xs transition">Sejarah</a>
                <a href="{{ route('visimisi') }}" class="block hover:text-amber-700 text-xs transition">Visi & Misi</a>
                <a href="{{ route('strukturorg') }}" class="block hover:text-amber-700 text-xs transition">Struktur Organisasi</a>
            </div>
            <a href="{{ route('galeri') }}" class="block text-amber-500 hover:text-amber-700 py-1 transition">Katalog</a>
            <a href="{{ route('berita.index') }}" class="block hover:text-amber-700 py-1 transition">Berita</a>
            <div class="border-l-2 border-amber-200 pl-3 space-y-2 my-1">
                <span class="text-xs text-stone-400 uppercase tracking-wider block">Living Museum</span>
                <a href="{{ route('walangsuji') }}" class="block hover:text-amber-700 text-xs transition">Walang Suji</a>
                <a href="{{ route('gosali') }}" class="block hover:text-amber-700 text-xs transition">Gosali</a>
            </div>
        </div>
    </header>

    <!-- 2. KONTEN UTAMA: GALERI (Gaya Google Images) -->
    <!-- Bagian Banner Latar Belakang Header Saja -->
<!-- Bagian Banner Latar Belakang Header Sepanjang Lebar Web -->
<div class="w-full mb-16 overflow-hidden aspect-[3/1] md:aspect-[21/9] lg:aspect-[3.5/1] bg-stone-900 shadow-sm">
    
    <!-- Gambar Latar Belakang Dinamis Khusus Halaman Galeri -->
    <!-- KOREKSI: Menggunakan variabel array global $banners dengan indeks 'galeri' -->
    @if(isset($banners) && isset($banners['galeri']))
        <img src="{{ asset('storage/' . $banners['galeri']) }}" 
             alt="Header Banner Galeri" 
             class="w-full h-full object-cover">
    @else
        <!-- KOREKSI: Menggunakan berkas gambar asli (.jpg) bertema museum/artefak bersejarah -->
        <img src="https://unsplash.com" 
             alt="Default Banner Galeri" 
             class="w-full h-full object-cover opacity-80">
    @endif

</div>
<main class="flex-grow max-w-7xl w-full mx-auto px-6 py-12 bg-[#fffbeb]">

    <!-- Bagian Judul dan Deskripsi -->
    <div class="text-center max-w-2xl mx-auto mb-16 flex flex-col items-center">
        <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-medium px-4 py-1.5 rounded-full mb-6 font-sans">
            Arsip & Dokumentasi Visual
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-amber-700 tracking-tight leading-[1.15] mb-4">
            Katalog Galeri
        </h1>
        <p class="font-sans text-sm text-stone-600 leading-relaxed max-w-xl">
            Jajahi kumpulan arsip visual artefak, dokumentasi sejarah, dan runtunan kegiatan pelestarian budaya di Museum Talaga Manggung.
        </p>
    </div>

    <!-- Bilah Filter Kategori Dinamis -->
    <div class="flex items-center space-x-2 overflow-x-auto pb-4 mb-10 scrollbar-none whitespace-nowrap">
        <!-- Tombol Semua Kategori -->
        <a href="{{ route('galeri') }}" 
           class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-200 {{ !request('kategori') ? 'bg-amber-600 text-white shadow-md shadow-amber-600/10' : 'bg-white text-stone-600 border border-stone-200 hover:border-amber-500 hover:text-amber-600' }}">
            Semua Foto
        </a>

        @foreach(['Arca Perunggu', 'Terracotta', 'Perlengkapan Ritual', 'Senjata Tradisional', 'Senjata Berpeledak', 'Pakaian Perlengkapan Perang', 'Etnografika', 'Keramokologika', 'Numismatika'] as $kat)
            <a href="{{ route('galeri', ['kategori' => $kat]) }}" 
               class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-200 {{ request('kategori') == $kat ? 'bg-amber-600 text-white shadow-md shadow-amber-600/10' : 'bg-white text-stone-600 border border-stone-200 hover:border-amber-500 hover:text-amber-600 hover:bg-amber-50/30' }}">
                {{ $kat }}
            </a>
        @endforeach
    </div>

    <!-- Grid Foto (Dinamis Berdasarkan Data Controller) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @forelse($galeri as $item)
            <!-- Item Foto / Artefak -->
            <div class="flex flex-col relative group bg-white border border-stone-200/60 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                
                <!-- Pembungkus Gambar Thumbnail -->
                <div class="overflow-hidden aspect-[4/3] bg-stone-100 relative">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                    
                    <!-- Badge Indikator Konten 3D di Atas Gambar -->
                    @if($item->link_3d)
                        <span class="absolute top-3 right-3 bg-amber-600 text-white text-[10px] font-black px-2.5 py-1 rounded-md shadow-md uppercase tracking-wider animate-pulse">
                            3D Model
                        </span>
                    @endif
                </div>

                <!-- Detail Konten -->
                <div class="p-4 bg-white flex-grow flex flex-col justify-between gap-4">
                    <div>
                        <p class="text-[10px] font-bold text-amber-600 uppercase tracking-wider">{{ $item->kategori }}</p>
                        <h3 class="text-sm font-semibold text-stone-800 mt-1 group-hover:text-amber-600 transition-colors">{{ $item->judul }}</h3>
                        @if($item->deskripsi)
                            <p class="text-xs text-stone-500 mt-1 line-clamp-2">{{ $item->deskripsi }}</p>
                        @endif
                    </div>

                    <div class="pt-2 border-t border-stone-100 flex flex-col gap-2">
                        <a href="{{ route('galeri.show', $item) }}" class="w-full inline-flex items-center justify-center bg-stone-800 hover:bg-stone-900 text-white font-bold text-xs px-3 py-2.5 rounded-xl transition duration-200">
                            Lihat Detail
                        </a>

                        @if($item->link_3d)
                            <a href="{{ $item->link_3d }}" target="_blank" rel="noopener noreferrer" 
                               class="w-full inline-flex items-center justify-center space-x-2 bg-amber-700 hover:bg-amber-800 text-white font-bold text-xs px-3 py-2.5 rounded-xl transition duration-200 shadow-sm">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-3-3M21 7.5l-3 3M21 7.5H8.25m0 0l3 3m-3-3l3-3M3 12h.008v.008H3V12zm0 4.5h.008v.008H3v-.008zm0-9h.008v.008H3V7.5z" />
                                </svg>
                                <span>Lihat Artefak 3D</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <!-- State Jika Data Kosong -->
            <div class="col-span-full py-16 text-center text-stone-400 text-sm italic">
                Belum ada dokumentasi foto atau artefak untuk kategori ini.
            </div>
        @endforelse

    </div>
</main>






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
