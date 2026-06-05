<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan & Agenda - Museum & Arsip Sejarah</title>
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
                <a href="{{ route('berita') }}" class=" hover:text-amber-700 transition">Berita</a>
                <a href="{{ route('kegiatan') }}" class="text-amber-500 hover:text-amber-700 transition">Kegiatan</a>

                <!-- Dropdown Living Museum (Sudah Interaktif Klik) -->
                <div class="relative inline-block text-left">
                    <button onclick="toggleDropdown(event, 'menuMuseum')" class="flex items-center hover:text-amber-700 transition gap-1 focus:outline-none">
                        Living Museum <span class="text-[9px]">▼</span>
                    </button>
                    <div id="menuMuseum" class="absolute left-0 mt-2 w-44 bg-white border border-amber-200 rounded-lg shadow-xl opacity-0 invisible -translate-y-2 transform transition-all duration-300 ease-out z-50 overflow-hidden text-left dropdown-list">
                        <a href="{{ route('walangsuji') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Walang Suji</a>
                        <a href="{{ route('gosali') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800">Gosali</a>
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
            <a href="{{ route('berita') }}" class="block   hover:text-amber-700 py-1 transition">Berita</a>
            <a href="{{ route('kegiatan') }}" class="block text-amber-500 hover:text-amber-700 py-1 transition">Kegiatan</a>
            <div class="border-l-2 border-amber-200 pl-3 space-y-2 my-1">
                <span class="text-xs text-stone-400 uppercase tracking-wider block">Living Museum</span>
                <a href="{{route('walangsuji')}}" class="block hover:text-amber-700 text-xs transition">Walang Suji</a>
                <a href="{{route('gosali')}}" class="block hover:text-amber-700 text-xs transition">Gosali</a>
            </div>
        </div>
    </header>

    <!-- 2. KONTEN UTAMA HALAMAN KEGIATAN -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-6 py-12">
        <!-- Header Halaman -->
        <div class="text-center max-w-2xl mx-auto mb-16 flex flex-col items-center">
            <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-medium px-4 py-1.5 rounded-full mb-6 font-sans">
                Agenda Museum
            </span>
            <!-- Update font-serif font-black tracking-tight untuk menyamakan dengan gambar -->
            <h1 class="text-4xl md:text-5xl font-black text-amber-700 tracking-tight leading-[1.15] mb-4">
                Kegiatan & Acara Mendatang
            </h1>
            <p class="font-sans text-sm text-stone-600 leading-relaxed max-w-xl">
                Ikuti berbagai aktivitas interaktif, seminar sejarah, pameran temporer, dan ritual adat kebudayaan yang diselenggarakan di lingkungan museum.
            </p>
        </div>

        <!-- Grid Kartu Kegiatan -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Kegiatan 1 -->
            <article class="bg-white border border-amber-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col font-sans">
                <div class="h-48 bg-stone-200 relative">
                    <div class="absolute top-3 left-3 bg-amber-600 text-white text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded shadow">
                        Mendatang
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-stone-400 font-medium text-xs">Foto Pameran</div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-[11px] font-semibold text-amber-600 uppercase tracking-wider block mb-2">Eksibisi Temporer</span>
                    <!-- Update font judul artikel menggunakan font-serif bold -->
                    <h2 class="text-lg font-serif font-bold text-stone-800 tracking-tight mb-2 hover:text-amber-700 transition">
                        <a href="#">Pameran Senjata Tradisional & Pusaka Kerajaan</a>
                    </h2>
                    <p class="text-xs text-stone-600 leading-relaxed mb-4 line-clamp-3">Eksibisi khusus yang memamerkan koleksi tombak, keris, dan perlengkapan perang peninggalan kemaharajaan Talaga Manggung yang jarang dibuka untuk publik...</p>
                    <div class="mt-auto pt-4 border-t border-stone-100 flex flex-col gap-1.5 text-[11px] text-stone-500">
                        <div class="flex items-center gap-1">
                            <span>📅 15 - 20 Juni 2026</span>
                        </div>
                        <div class="flex items-center justify-between mt-1">
                            <span>📍 Ruang Paviliun Utama</span>
                            <a href="#" class="font-semibold text-amber-600 hover:text-amber-800">Detail Acara →</a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Kegiatan 2 -->
            <article class="bg-white border border-amber-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col font-sans">
                <div class="h-48 bg-stone-200 relative">
                    <div class="absolute top-3 left-3 bg-stone-700 text-white text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded shadow">
                        Registrasi Dibuka
                    </div>
                                        <div class="absolute inset-0 flex items-center justify-center text-stone-400 font-medium text-xs">Foto Seminar</div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-[11px] font-semibold text-amber-600 uppercase tracking-wider block mb-2">Workshop & Seminar</span>
                    <h2 class="text-lg font-serif font-bold text-stone-800 tracking-tight mb-2 hover:text-amber-700 transition">
                        <a href="#">Seminar Nasional: Menelusuri Jejak Arsitektur Gosali</a>
                    </h2>
                    <p class="text-xs text-stone-600 leading-relaxed mb-4 line-clamp-3">Bedah tuntas sejarah pandai besi tradisional (Gosali) beserta pengaruh nilai sosiologisnya terhadap ketahanan ekonomi masyarakat adat masa lampau...</p>
                    <div class="mt-auto pt-4 border-t border-stone-100 flex flex-col gap-1.5 text-[11px] text-stone-500">
                        <div class="flex items-center gap-1">
                            <span>📅 28 Juni 2026</span>
                        </div>
                        <div class="flex items-center justify-between mt-1">
                            <span>📍 Aula Pancaniti (Free)</span>
                            <a href="#" class="font-semibold text-amber-600 hover:text-amber-800">Daftar Sekarang →</a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Kegiatan 3 -->
            <article class="bg-white border border-amber-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col font-sans">
                <div class="h-48 bg-stone-200 relative">
                    <div class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded shadow">
                        Rutin
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-stone-400 font-medium text-xs">Foto Pentas Musik</div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-[11px] font-semibold text-amber-600 uppercase tracking-wider block mb-2">Pertunjukan Seni</span>
                    <h2 class="text-lg font-serif font-bold text-stone-800 tracking-tight mb-2 hover:text-amber-700 transition">
                        <a href="#">Pementasan Seni Musik Karawitan & Tari Klasik</a>
                    </h2>
                    <p class="text-xs text-stone-600 leading-relaxed mb-4 line-clamp-3">Pertunjukan kesenian tradisional mingguan yang dibawakan langsung oleh sanggar seni binaan asli komite pelestari adat Sunda binaan museum...</p>
                    <div class="mt-auto pt-4 border-t border-stone-100 flex flex-col gap-1.5 text-[11px] text-stone-500">
                        <div class="flex items-center gap-1">
                            <span>📅 Setiap Hari Sabtu (14:00 WIB)</span>
                        </div>
                        <div class="flex items-center justify-between mt-1">
                            <span>📍 Area Terbuka Walang Suji</span>
                            <a href="#" class="font-semibold text-amber-600 hover:text-amber-800">Lihat Jadwal →</a>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </section>
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
                <a href="{{ url('/') }}" class="hover:text-white hover:underline transition">Beranda</a>
                <a href="{{ route('berita') }}" class="hover:text-white hover:underline transition">Berita</a>
                <a href="{{ url('/#pameran') }}" class="hover:text-white hover:underline transition">Galeri</a>
                <a href="{{ route('kegiatan') }}" class="hover:text-white hover:underline transition">Kegiatan</a>
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

