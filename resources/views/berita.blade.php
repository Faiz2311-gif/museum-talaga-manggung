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

                <!-- Dropdown Profil -->
                <div class="relative group">
                    <button class="flex items-center hover:text-amber-700 transition gap-1 focus:outline-none">
                        Profil <span class="text-[9px]">▼</span>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white border border-amber-200 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden text-left">
                        <a href="{{ url('/#sejarah') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Sejarah</a>
                        <a href="{{ url('/#visi-misi') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Visi & Misi</a>
                        <a href="{{ url('/#struktur') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800">Struktur Organisasi</a>
                    </div>
                </div>

                <a href="{{ route('galeri') }}" class="hover:text-amber-700 transition">Galeri</a>

                <!-- MENU AKTIF: Berita berwarna amber -->
                <a href="{{ route('berita') }}" class="text-amber-500 hover:text-amber-700 transition">Berita</a>
                <a href="{{ route('kegiatan') }}" class="hover:text-amber-700 transition">Kegiatan</a>

                <!-- Dropdown Living Museum -->
                <div class="relative group">
                    <button class="flex items-center hover:text-amber-700 transition gap-1 focus:outline-none">
                        Living Museum <span class="text-[9px]">▼</span>
                    </button>
                    <div class="absolute left-0 mt-2 w-44 bg-white border border-amber-200 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden text-left">
                        <a href="#" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Walang Suji</a>
                        <a href="#" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800">Gosali</a>
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
                <a href="{{ url('/#sejarah') }}" class="block hover:text-amber-700 text-xs transition">Sejarah</a>
                <a href="{{ url('/#visi-misi') }}" class="block hover:text-amber-700 text-xs transition">Visi & Misi</a>
                <a href="{{ url('/#struktur') }}" class="block hover:text-amber-700 text-xs transition">Struktur Organisasi</a>
            </div>
            <a href="{{ route('galeri') }}" class="block hover:text-amber-700 py-1 transition">Galeri</a>

            <!-- MENU AKTIF SELULER -->
            <a href="{{ route('berita') }}" class="block text-amber-500 hover:text-amber-700 py-1 transition">Berita</a>
            <a href="{{ route('kegiatan') }}" class="block hover:text-amber-700 py-1 transition">Kegiatan</a>
            <div class="border-l-2 border-amber-200 pl-3 space-y-2 my-1">
                <span class="text-xs text-stone-400 uppercase tracking-wider block">Living Museum</span>
                <a href="#" class="block hover:text-amber-700 text-xs transition">Walang Suji</a>
                <a href="#" class="block hover:text-amber-700 text-xs transition">Gosali</a>
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
            <!-- Update font-serif font-black tracking-tight untuk menyamakan dengan gambar -->
            <h1 class="text-4xl md:text-5xl font-black text-amber-700 tracking-tight leading-[1.15] mb-4">
                Kabar & Rilis Berita Museum
            </h1>
            <p class="font-sans text-sm text-stone-600 leading-relaxed max-w-xl">
                Ikuti perkembangan terbaru mengenai konservasi artefak, temuan arsip sejarah, dan agenda kebudayaan di Museum Talaga Manggung.
            </p>
        </div>

        <!-- Grid Kartu Berita -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 font-sans">

            <!-- Berita 1 -->
            <article class="bg-white border border-amber-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                <div class="h-48 bg-stone-200 relative">
                    <div class="absolute inset-0 flex items-center justify-center text-stone-400 font-medium text-xs">Foto Artefak</div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-[11px] font-semibold text-amber-600 uppercase tracking-wider block mb-2">Konservasi</span>
                    <!-- Update font judul artikel menggunakan font-serif bold -->
                    <h2 class="text-lg font-serif font-bold text-stone-800 tracking-tight mb-2 hover:text-amber-700 transition">
                        <a href="#">Restorasi Naskah Kuno Abad ke-17 Rampung Selesai</a>
                    </h2>
                    <p class="text-xs text-stone-600 leading-relaxed mb-4 line-clamp-3">Tim konservator berhasil membersihkan dan mendigitalisasi lembaran naskah kuno berbahan dasar daun lontar asli warisan kerajaan...</p>
                    <div class="mt-auto pt-4 border-t border-stone-100 flex items-center justify-between text-[11px] text-stone-500">
                        <span>30 Mei 2026</span>
                        <a href="#" class="font-semibold text-amber-600 hover:text-amber-800">Baca Selengkapnya →</a>
                    </div>
                </div>
            </article>

            <!-- Berita 2 -->
            <article class="bg-white border border-amber-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                <div class="h-48 bg-stone-200 relative">
                    <div class="absolute inset-0 flex items-center justify-center text-stone-400 font-medium text-xs">Foto Kunjungan</div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-[11px] font-semibold text-amber-600 uppercase tracking-wider block mb-2">Edukasi</span>
                    <h2 class="text-lg font-serif font-bold text-stone-800 tracking-tight mb-2 hover:text-amber-700 transition">
                        <a href="#">Kunjungan Studi Sejarah Interaktif Tingkat Nasional</a>
                    </h2>
                    <p class="text-xs text-stone-600 leading-relaxed mb-4 line-clamp-3">Museum menerima kunjungan kehormatan dari delegasi universitas untuk meneliti keterkaitan arsip lokal dengan peta perdagangan maritim...</p>
<div class="mt-auto pt-4 border-t border-stone-100 flex items-center justify-between text-[11px] text-stone-500">
                        <span>25 Mei 2026</span>
                        <a href="#" class="font-semibold text-amber-600 hover:text-amber-800">Baca Selengkapnya →</a>
                    </div>
                </div>
            </article>

            <!-- Berita 3 -->
            <article class="bg-white border border-amber-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                <div class="h-48 bg-stone-200 relative">
                    <div class="absolute inset-0 flex items-center justify-center text-stone-400 font-medium text-xs">Foto Hibahan</div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-[11px] font-semibold text-amber-600 uppercase tracking-wider block mb-2">Eksibisi</span>
                    <h2 class="text-lg font-serif font-bold text-stone-800 tracking-tight mb-2 hover:text-amber-700 transition">
                        <a href="#">Penambahan Koleksi Baru Hibah Keramik Dinasti Ming</a>
                    </h2>
                    <p class="text-xs text-stone-600 leading-relaxed mb-4 line-clamp-3">Seorang kolektor lokal secara resmi menyerahkan tiga buah mangkuk keramik otentik untuk dipamerkan di ruang publik galeri utama...</p>
                    <div class="mt-auto pt-4 border-t border-stone-100 flex items-center justify-between text-[11px] text-stone-500">
                        <span>18 Mei 2026</span>
                        <a href="#" class="font-semibold text-amber-600 hover:text-amber-800">Baca Selengkapnya →</a>
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
</script>
