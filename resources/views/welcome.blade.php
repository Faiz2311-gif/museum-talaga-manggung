<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Museum & Arsip Sejarah</title>
    <!-- Menghubungkan aset CSS & JS lokal Laravel (Tailwind) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- Mengubah total latar belakang body menjadi tema krem muda yang hangat -->
<body class="bg-amber-50 text-stone-900 antialiased font-sans min-h-screen">

    <!-- 1. BILAH NAVIGASI (NAVBAR) - Diperbarui ke tema muda -->
    <header class="border-b border-amber-200 bg-white/80 backdrop-blur sticky top-0 z-50 shadow-sm">
    <!-- Menggunakan flex justify-between untuk memisahkan logo (kiri) dan navigasi (kanan) -->
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between gap-4">

        <!-- SISI KIRI: Logo Web (Selalu Muncul) -->
        <div class="flex items-center font-sans tracking-wide shrink-0">
            <a href="#" class="block hover:opacity-90 transition">
                <img src="{{ Vite::asset('resources/images/image_ee43ecbd.svg') }}"
                     alt="Museum Talaga Manggung"
                     class="h-auto max-h-12 w-auto object-contain" />
            </a>
        </div>

        <!-- SISI KANAN: Menu Desktop (Diubah menjadi rata kanan dengan 'ml-auto') -->
        <nav class="hidden md:flex items-center space-x-6 text-xs md:text-sm font-medium text-stone-600 whitespace-nowrap ml-auto">
<a href="#" class="text-amber-500 hover:text-amber-700 transition">Beranda</a>

           <!-- DROPDOWN 1: PROFIL -->
<div class="relative inline-block text-left">
    <!-- Mengirim ID 'menuProfil' ke JavaScript -->
    <button onclick="toggleDropdown(event, 'menuProfil')" class="flex items-center hover:text-amber-700 transition gap-1 focus:outline-none">
        Profil <span class="text-[9px]">▼</span>
    </button>
    <!-- ID diubah menjadi 'menuProfil' -->
    <div id="menuProfil" class="absolute left-0 mt-2 w-48 bg-white border border-amber-200 rounded-lg shadow-xl opacity-0 invisible -translate-y-2 transform transition-all duration-300 ease-out z-50 overflow-hidden text-left dropdown-list">
        <a href="{{ route('sejarah')}}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Sejarah</a>
        <a href="{{ route('visimisi')}}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Visi & Misi</a>
        <a href="{{ route('strukturorg')}}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800">Struktur Organisasi</a>
    </div>
</div>

<a href="{{ route('galeri')}}" class="hover:text-amber-700 transition">Galeri</a>
<a href="{{ route('berita.index') }}" class="hover:text-amber-700 transition">Berita</a>

            <!-- DROPDOWN 2: LIVING MUSEUM -->
<div class="relative inline-block text-left">
    <!-- Mengirim ID 'menuMuseum' ke JavaScript -->
    <button onclick="toggleDropdown(event, 'menuMuseum')" class="flex items-center hover:text-amber-700 transition gap-1 focus:outline-none">
        Living Museum <span class="text-[9px]">▼</span>
    </button>
    <!-- ID diubah menjadi 'menuMuseum' -->
    <div id="menuMuseum" class="absolute left-0 mt-2 w-48 bg-white border border-amber-200 rounded-lg shadow-xl opacity-0 invisible -translate-y-2 transform transition-all duration-300 ease-out z-50 overflow-hidden text-left dropdown-list">
        <a href="{{ route('walangsuji') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800 border-b border-amber-100">Walang Suji</a>
        <a href="{{ route('gosali') }}" class="block px-4 py-2.5 text-xs text-stone-700 hover:bg-amber-50 hover:text-amber-800">Gosali</a>
    </div>
</div>
        </nav>

        <!-- SISI KANAN NYATA: Tombol Menu Hamburger untuk HP -->
        <div class="flex items-center md:hidden">
            <button id="mobile-menu-button" type="button" class="text-stone-600 hover:text-amber-700 focus:outline-none p-2 rounded-md hover:bg-amber-50 transition" aria-label="Toggle menu">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- PANEL MENU SELULER -->
     <!-- PANEL MENU SELULER (AKTIF DI BERANDA) -->
<div id="mobile-menu" class="hidden md:hidden border-t border-amber-100 bg-white px-6 py-4 space-y-3 text-sm font-medium text-stone-600 shadow-inner">

    <!-- MENU AKTIF SELULER: Beranda berwarna amber -->
    <a href="{{ url('/') }}" class="block text-amber-500 hover:text-amber-700 py-1 transition">Beranda</a>

    <div class="border-l-2 border-amber-200 pl-3 space-y-2 my-1">
        <span class="text-xs text-stone-400 uppercase tracking-wider block">Profil</span>
        <a href="{{ route('sejarah') }}" class="block hover:text-amber-700 text-xs transition">Sejarah</a>
        <a href="{{ route('visimisi') }}" class="block hover:text-amber-700 text-xs transition">Visi & Misi</a>
        <a href="{{ route('strukturorg') }}" class="block hover:text-amber-700 text-xs transition">Struktur Organisasi</a>
    </div>

    <a href="{{ route('galeri') }}" class="block hover:text-amber-700 py-1 transition">Galeri</a>

    <!-- Menu Berita kembali ke warna standar standar -->
    <a href="{{ route('berita.index') }}" class="block hover:text-amber-700 py-1 transition">Berita</a>

    <div class="border-l-2 border-amber-200 pl-3 space-y-2 my-1">
        <span class="text-xs text-stone-400 uppercase tracking-wider block">Living Museum</span>
        <a href="{{ route('walangsuji') }}" class="block hover:text-amber-700 text-xs transition">Walang Suji</a>
        <a href="{{ route('gosali') }}" class="block hover:text-amber-700 text-xs transition">Gosali</a>
    </div>
</div>

    </div>
</header>

<!-- 1. Pastikan CDN CSS AOS Tertulis dengan Benar -->
<link rel="stylesheet"
      href="https://unpkg.com/aos@2.3.4/dist/aos.css">

<main class="bg-[#fdfbf2]">

    <!-- 2. BAGIAN HERO (Menggunakan Efek Fade Up Keseluruhan) -->
    <section data-aos="fade-up" data-aos-duration="1000" class="relative isolate overflow-hidden pt-20 pb-24 flex items-center min-h-[80vh] border-b border-amber-200">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <!-- Elemen di dalam menggunakan delay agar muncul berurutan (Staggered) -->
                <span data-aos="fade-down" data-aos-duration="800" data-aos-delay="200" class="inline-flex items-center rounded-full bg-amber-600/10 px-4 py-1.5 text-xs font-medium text-amber-800 ring-1 ring-inset ring-amber-600/20 mb-6">
                    Sistem Profil Museum V1.0
                </span>

                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" class="text-4xl md:text-6xl font-black tracking-tight text-stone-900 sm:text-7xl leading-[1.15]">
                    Melestarikan Sejarah Lewat <span class="text-amber-700">Arsip Digital</span>
                </h1>

                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600" class="mt-8 text-lg font-normal text-stone-600 sm:text-xl/8">
                    Selamat datang di konsep portal digital museum kami. Antarmuka ini menghubungkan keindahan tata letak galeri sejarah dengan sistem manajemen data yang modern dan aman.
                </p>

                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800" class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="#pameran" class="rounded-lg bg-amber-700 px-6 py-3.5 text-base font-semibold text-white shadow-md hover:bg-amber-600 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">Jelajahi Galeri</a>
                    <a href="#tentang" class="text-base font-semibold text-stone-700 hover:text-amber-700 transition">Latar Belakang Instansi <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. BAGIAN TENTANG (Menggunakan Efek Zoom In saat di-scroll) -->
    <section id="tentang" data-aos="zoom-in-up" data-aos-duration="1000" class="py-24 border-b border-amber-200 bg-amber-100/30 overflow-hidden">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 items-center">
                <!-- Konten teks bergeser sedikit -->
                <div data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">
                    <h2 class="text-base font-semibold text-amber-700 tracking-wide uppercase">Sejarah Yayasan</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">Tentang Lembaga Kami</p>
                    <p class="mt-6 text-base text-stone-600 leading-7">
                        Didirikan dengan misi utama untuk mengatalogkan, menjaga, dan menampilkan berbagai pencapaian budaya serta sejarah penting. Institusi fisik kami mengelola dokumen arsip berharga, artefak kuno, dan aset multimedia.
                    </p>
                    <p class="mt-4 text-base text-stone-600 leading-7">
                        Portal web ini berfungsi sebagai wadah visual untuk menyajikan koleksi pameran kepada publik, sekaligus memudahkan petugas admin yang sah untuk memperbarui data katalog secara langsung.
                    </p>
                </div>
                <!-- Gambar/Mockup masuk dari kanan -->
                <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="500" class="bg-amber-100 border border-amber-200 rounded-2xl h-80 flex items-center justify-center text-amber-800/60 italic shadow-sm hover:shadow-md transition-shadow duration-300">
                    [ Area Foto: Fasilitas Museum / Gedung Utama ]
                </div>
            </div>
        </div>
    </section>

    <!-- 4. BAGIAN KOLEKSI PAMERAN (Menggunakan Efek Slide Up) -->
    <section id="pameran" data-aos="slide-up" data-aos-duration="1000" class="py-24 border-b border-amber-200">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200" class="mx-auto max-w-2xl text-center mb-16">
                <h2 class="text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">Koleksi Unggulan</h2>
                <p class="mt-4 text-stone-600">Berikut adalah beberapa kategori galeri utama yang saat ini dikelola di dalam sistem basis data kami.</p>
            </div>

            <!-- Grid Kartu dengan efek transisi bergantian -->
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="400" class="bg-white border border-amber-200 rounded-xl overflow-hidden p-6 hover:border-amber-500/50 transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1 transform">
                    <div class="bg-amber-50 rounded-lg h-44 mb-6 flex items-center justify-center text-amber-800/40">Pratinjau Gambar</div>
                    <h3 class="text-xl font-bold text-stone-900">Era Artefak Kuno</h3>
                    <p class="mt-3 text-sm text-stone-600 leading-6">Kumpulan katalog arkeologi fisik bersejarah yang disimpan dengan aman di dalam ruang penyimpanan sayap barat.</p>
                </div>

                <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="550" class="bg-white border border-amber-200 rounded-xl overflow-hidden p-6 hover:border-amber-500/50 transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1 transform">
                    <div class="bg-amber-50 rounded-lg h-44 mb-6 flex items-center justify-center text-amber-800/40">Pratinjau Gambar</div>
                    <h3 class="text-xl font-bold text-stone-900">Dokumen Kerangka Pendirian</h3>
                    <p class="mt-3 text-sm text-stone-600 leading-6">Log arsip piagam asli lembaga, cetak biru bangunan lama, dan rekaman media sejarah pendiri awal.</p>
                </div>

                <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="700" class="bg-white border border-amber-200 rounded-xl overflow-hidden p-6 hover:border-amber-500/50 transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1 transform">
                    <div class="bg-amber-50 rounded-lg h-44 mb-6 flex items-center justify-center text-amber-800/40">Pratinjau Gambar</div>
                    <h3 class="text-xl font-bold text-stone-900">Galeri Seni Visual</h3>
                    <p class="mt-3 text-sm text-stone-600 leading-6">Dokumentasi digital karya seni rupa, lukisan klasik, dan potret peninggalan budaya wilayah Talaga.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- 5. Script Pengaktif Animasi di Akhir Halaman -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        once: true,
        offset: 160,
        duration: 1000,
        easing: 'ease-out-cubic'
    });
});
</script>


                <!-- 3. KAKI HALAMAN (FOOTER) RESPONSIF -->
<!-- Menambahkan w-full dan overflow-hidden untuk mencegah kebocoran layar kanan -->
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

