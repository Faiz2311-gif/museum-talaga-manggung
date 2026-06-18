<x-app-layout>
    <!-- Tambahkan aset AOS jika layout utama (app-layout) Anda belum memuatnya -->
    <link rel="stylesheet" href="https://unpkg.com" />

    <!-- Pembungkus Konten Utama dengan Latar Belakang Krem Khas Museum -->
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Bagian Judul Dashboard (Se-tema dengan Header Berita & Galeri) -->
            <div data-aos="fade-down" data-aos-duration="800" class="mb-10 flex flex-col items-start">
                <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase">
                    Panel Manajemen Sistem
                </span>
                <h1 class="text-3xl md:text-4xl font-black text-amber-700 tracking-tight leading-tight">
                    {{ __('Selamat Datang, Admin') }}
                </h1>
                <p class="text-sm text-stone-500 mt-2">
                    Gunakan ruang kerja ini untuk memantau data operasional dan mengelola arsip kebudayaan.
                </p>
            </div>

            <!-- Konten Kartu Utama (Warna Putih Bersih agar Pop-Out di Atas Krem) -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" 
                 class="bg-white border border-amber-200/60 overflow-hidden shadow-sm rounded-2xl p-8 hover:shadow-md transition-shadow duration-300">
                
                <div class="flex items-center space-x-4 border-b border-stone-100 pb-6 mb-6">
                    <!-- Indikator Berhasil Masuk Bergaya Minimalis -->
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 border border-amber-200 text-amber-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-stone-800">Status Autentikasi</h3>
                        <p class="text-xs text-stone-500">{{ __("Sesi Anda saat ini aktif dan terenkripsi dengan aman.") }}</p>
                    </div>
                </div>

                <!-- Konten Menu Pintas Kontrol Admin ke Bagian User Biasa -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-6">
                    
                    <!-- Menu Pintas 1 -->
                     <a href="/" wire:navigate class="group flex flex-col justify-between p-5 bg-stone-50/50 hover:bg-amber-50/30 border border-stone-200/70 hover:border-amber-500/50 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md">
    <div>
        <span class="text-[10px] font-bold uppercase tracking-wider text-amber-600">Halaman Utama</span>
        <h4 class="text-sm font-bold text-stone-800 mt-1 group-hover:text-amber-700 transition-colors">Kelola Konten Beranda</h4>
    </div>
    <span class="text-xs font-semibold text-stone-500 mt-4 inline-flex items-center group-hover:text-amber-700">
        Buka modul <span class="ms-1 transform group-hover:translate-x-1 transition-transform">→</span>
    </span>
</a>

                    <a href="/galeri" class="group flex flex-col justify-between p-5 bg-stone-50/50 hover:bg-amber-50/30 border border-stone-200/70 hover:border-amber-500/50 rounded-xl transition-all duration-200">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-amber-600">Arsip Gambar</span>
                            <h4 class="text-sm font-bold text-stone-800 mt-1 group-hover:text-amber-700 transition-colors">Kelola Galeri Sejarah</h4>
                        </div>
                        <span class="text-xs font-semibold text-stone-500 mt-4 inline-flex items-center group-hover:text-amber-700">
                            Buka modul <span class="ms-1 transform group-hover:translate-x-1 transition-transform">→</span>
                        </span>
                    </a>

                    <!-- Menu Pintas 2 -->
                    <a href="/berita" class="group flex flex-col justify-between p-5 bg-stone-50/50 hover:bg-amber-50/30 border border-stone-200/70 hover:border-amber-500/50 rounded-xl transition-all duration-200">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-amber-600">Publikasi</span>
                            <h4 class="text-sm font-bold text-stone-800 mt-1 group-hover:text-amber-700 transition-colors">Tulis Berita & Rilis</h4>
                        </div>
                        <span class="text-xs font-semibold text-stone-500 mt-4 inline-flex items-center group-hover:text-amber-700">
                            Buka modul <span class="ms-1 transform group-hover:translate-x-1 transition-transform">→</span>
                        </span>
                    </a>

                </div>
            </div>

        </div>
    </div>

    <!-- Script Pengaktif Animasi Masuk AOS -->
    <script src="https://unpkg.com"></script>
    <script>
        AOS.init({
            once: true,
            easing: 'ease-out-cubic'
        });
    </script>
</x-app-layout>

