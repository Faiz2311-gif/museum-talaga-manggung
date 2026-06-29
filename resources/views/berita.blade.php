<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Kegiatan - Museum & Arsip Sejarah</title>
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
                <a href="{{ route('galeri') }}" class=" hover:text-amber-700 transition">Galeri</a>
                <a href="{{ route('berita.index') }}" class=" text-amber-500 hover:text-amber-700 transition">Berita</a>
                <a href="{{ route('kegiatan') }}" class="hover:text-amber-700 transition">Kegiatan</a>

                <!-- Dropdown Living Museum (Sudah Interaktif Klik) -->
                <div class="relative inline-block text-left">
                    <button onclick="toggleDropdown(event, 'menuMuseum')" class="flex items-center hover:text-amber-700 transition gap-1 focus:outline-none">
                        Living Museum <span class="text-[9px]">▼</span>
                    </button>
                    <div id="menuMuseum" class="absolute left-0 mt-2 w-44 bg-white border border-amber-200 rounded-lg shadow-xl opacity-0 invisible -translate-y-2 transform transition-all duration-300 ease-out z-50 overflow-hidden text-left dropdown-list">
                        <a href="{{route('walangsuji')}}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Walang Suji</a>
                        <a href="{{route('gosali')}}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800">Gosali</a>
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
            <a href="{{ route('galeri') }}" class="block hover:text-amber-700 py-1 transition">Galeri</a>
            <a href="{{ route('berita.index') }}" class="block  text-amber-500 hover:text-amber-700 py-1 transition">Berita</a>
            <a href="{{ route('kegiatan') }}" class="block hover:text-amber-700 py-1 transition">Kegiatan</a>
            <div class="border-l-2 border-amber-200 pl-3 space-y-2 my-1">
                <span class="text-xs text-stone-400 uppercase tracking-wider block">Living Museum</span>
                <a href="{{ route('walangsuji')}}" class="block hover:text-amber-700 text-xs transition">Walang Suji</a>
                <a href="{{ route('gosali')}}" class="block hover:text-amber-700 text-xs transition">Gosali</a>
            </div>
        </div>
    </header>

    <!-- 2. KONTEN UTAMA HALAMAN BERITA -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-6 py-12">
    <!-- Header Halaman -->
    <div class="text-center max-w-2xl mx-auto mb-16 flex flex-col items-center">
        <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-medium px-4 py-1.5 rounded-full mb-6 font-sans">
            Kabar & Publikasi Instansi
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-amber-700 tracking-tight leading-[1.15] mb-4">
            Kabar & Rilis Berita Museum
        </h1>
        <p class="font-sans text-sm text-stone-600 leading-relaxed max-w-xl">
            Ikuti perkembangan terbaru mengenai konservasi artefak, temuan arsip sejarah, dan agenda kebudayaan di Museum Talaga Manggung.
        </p>
    </div>

    <!-- Komponen Search, Filter & Sortir Berita -->
<div class="mb-10 bg-white border border-amber-200/60 p-6 rounded-2xl shadow-sm">
    <form action="{{ url()->current() }}" method="GET" class="space-y-4 md:space-y-0 md:flex md:items-end md:gap-4 justify-between">
        
        <!-- Bagian Input Pencarian Teks -->
        <div class="flex-1">
            <label Lifor="search" class="block text-[11px] font-bold uppercase tracking-wider text-stone-600 mb-1.5">Cari Artikel</label>
            <div class="relative">
                <input type="text" name="search" id="search" value="{{ request('search') }}" 
                       placeholder="Masukkan judul atau kata kunci berita..." 
                       class="w-full border border-stone-200 rounded-xl pl-10 pr-4 py-2 text-xs focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40 text-stone-700 font-medium placeholder-stone-400">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-stone-400">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.604 10.604z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Bagian Opsi Dropdown Filter -->
        <div class="grid grid-cols-2 gap-3 sm:w-auto w-full">
            <!-- Filter Kategori -->
            <div>
                <label for="kategori" class="block text-[11px] font-bold uppercase tracking-wider text-stone-600 mb-1.5">Kategori</label>
                <select name="kategori" id="kategori" onchange="this.form.submit()" class="w-full sm:w-44 border border-stone-200 rounded-xl px-3 py-2 text-xs focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40 text-stone-700 font-medium">
                    <option value="">Semua Kategori</option>
                    <option value="Kegiatan" {{ request('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="Pengumuman" {{ request('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    <option value="Penelitian" {{ request('kategori') == 'Penelitian' ? 'selected' : '' }}>Penelitian</option>
                    <option value="Event" {{ request('kategori') == 'Event' ? 'selected' : '' }}>Event</option>
                </select>
            </div>

            <!-- Urutan Rilis -->
            <div>
                <label for="urutan" class="block text-[11px] font-bold uppercase tracking-wider text-stone-600 mb-1.5">Urutan Rilis</label>
                <select name="urutan" id="urutan" onchange="this.form.submit()" class="w-full sm:w-44 border border-stone-200 rounded-xl px-3 py-2 text-xs focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40 text-stone-700 font-medium">
                    <option value="terbaru" {{ request('urutan') == 'terbaru' ? 'selected' : '' }}>Terbaru ➔ Terlama</option>
                    <option value="terlama" {{ request('urutan') == 'terlama' ? 'selected' : '' }}>Terlama ➔ Terbaru</option>
                </select>
            </div>
        </div>

        <!-- Tombol Aksi Manual (Khusus Input Pencarian) & Reset -->
        <div class="flex items-center gap-2 pt-2 md:pt-0 w-full md:w-auto">
            <button type="submit" class="w-full md:w-auto bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs px-4 py-2 rounded-xl shadow-sm transition whitespace-nowrap">
                Cari
            </button>
            @if(request('search') || request('kategori') || (request('urutan') && request('urutan') !== 'terbaru'))
                <a href="{{ url()->current() }}" class="w-full md:w-auto text-center border border-stone-200 bg-stone-50 hover:bg-stone-100 text-stone-600 font-bold text-xs px-4 py-2 rounded-xl transition whitespace-nowrap">
                    ✕ Reset
                </a>
            @endif
        </div>

    </form>
</div>


    <!-- Grid Kartu Berita -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 font-sans">

        @forelse ($berita as $item)
            <!-- Kartu Berita Dinamis -->
            <article class="bg-white border border-amber-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                <div class="h-48 bg-stone-200 relative">
                    @if($item->foto)
                        <!-- Menampilkan Foto dari Storage -->
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                    @else
                        <!-- Fallback jika tidak ada foto -->
                        <div class="absolute inset-0 flex items-center justify-center text-stone-400 font-medium text-xs">Tidak Ada Foto</div>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <!-- Kategori Berita -->
                    <span class="text-[11px] font-semibold text-amber-600 uppercase tracking-wider block mb-2">
                        {{ $item->kategori }}
                    </span>
                    
                    <!-- Judul Artikel -->
                    <h2 class="text-lg font-serif font-bold text-stone-800 tracking-tight mb-2 hover:text-amber-700 transition">
                        <a href="{{ route('berita.show', $item->id) }}">{{ $item->judul }}</a>
                    </h2>
                    
                    <!-- Ringkasan Deskripsi -->
                    <p class="text-xs text-stone-600 leading-relaxed mb-4 line-clamp-3">
                        {{ $item->ringkasan }}
                    </p>
                    
                    <div class="mt-auto pt-4 border-t border-stone-100 flex items-center justify-between text-[11px] text-stone-500">
                        <!-- Format Tanggal Indonesia (Contoh: 30 Mei 2026) -->
                        <span>{{ \Carbon\Carbon::parse($item->tanggal_publikasi)->translatedFormat('d F Y') }}</span>
                        
                        <!-- Link ke Detail Berita -->
                        <a href="{{ route('berita.show', $item->id) }}" class="font-semibold text-amber-600 hover:text-amber-800">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <!-- Tampilan jika database masih kosong -->
            <div class="col-span-full text-center py-12 text-stone-500 font-sans">
                Belum ada berita yang dipublikasikan.
            </div>
        @endforelse

    </div>
</main>

<footer class="bg-[#1c1917] text-stone-400 text-xs py-12 border-t border-stone-800 font-sans mt-auto w-full overflow-hidden">
    <!-- Membungkus isi dengan wadah maksimal max-w-7xl dan menambahkan padding x-6 yang aman -->
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">

        <!-- KOLOM 1: Informasi Instansi & Hak Cipta -->
        <div class="flex flex-col justify-between space-y-2">
            <div>
                <h3 class="text-white font-serif font-black text-sm tracking-tight mb-2">Museum Talaga Manggung</h3>
                <p class="text-stone-500 leading-relaxed text-[11px]">Wadah pelestarian benda pusaka, manuskrip kuno, dan rekam jejak sejarah peradaban institusi.</p>
            </div>
            <p class="text-stone-600 pt-4 md:pt-0">&copy; 2026 Hak Cipta Dilindungi.</p>
        </div>

        <!-- KOLOM 2: Navigasi Tautan Cepat -->
        <div class="flex flex-col space-y-2.5">
            <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-1">Akses Pintasan</h4>
            <div class="grid grid-cols-2 gap-x-4 gap-y-2 max-w-xs mx-auto md:mx-0 text-left">
                {{-- <a href="{{ url('/') }}" class="hover:text-white hover:underline transition">Beranda</a>
                <a href="{{ route('berita') }}" class="hover:text-white hover:underline transition">Berita</a>
                <a href="{{ url('/#pameran') }}" class="hover:text-white hover:underline transition">Galeri</a>
                <a href="{{ route('kegiatan') }}" class="hover:text-white hover:underline transition">Kegiatan</a> --}}
            </div>
        </div>

        <!-- KOLOM 3: Legalitas & Dokumen Kebijakan -->
        <div class="flex flex-col space-y-2.5">
            <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-1">Informasi Hukum</h4>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-white transition">Kebijakan Privasi</a></li>
                <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan Penggunaan</a></li>
                <li><a href="#" class="hover:text-white transition">Bantuan & Kontak Resmi</a></li>
            </ul>
        </div>

    </div>
</footer>
</body>

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
