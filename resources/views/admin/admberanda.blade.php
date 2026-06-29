<x-app-layout>
    <!-- Pembungkus Konten Utama dengan Latar Belakang Krem Khas Museum -->
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Bagian Judul Beranda (Se-tema dengan Header Dashboard) -->
            <div data-aos="fade-down" data-aos-duration="800" class="mb-10 flex flex-col items-start">
                <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase">
                    Halaman Beranda
                </span>
                <h1 class="text-3xl md:text-4xl font-black text-amber-700 tracking-tight leading-tight">
                    {{ __('Kelola Konten Beranda') }}
                </h1>
                <p class="text-sm text-stone-500 mt-2">
                    Perbarui teks sambutan, banner, dan informasi utama yang ditampilkan di halaman depan website.
                </p>
            </div>

            <!-- Konten Kartu Utama (Warna Putih Bersih agar Pop-Out di Atas Krem) -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" 
                 class="bg-white border border-amber-200/60 overflow-hidden shadow-sm rounded-2xl p-8 hover:shadow-md transition-shadow duration-300">
                
                <!-- Indikator Status -->
                <div class="flex items-center space-x-4 border-b border-stone-100 pb-6 mb-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 border border-amber-200 text-amber-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-stone-800">Halaman Beranda</h3>
                        <p class="text-xs text-stone-500">{{ __("Ruang kerja untuk mengelola konten utama website museum.") }}</p>
                    </div>
                </div>

                <!-- Area Konten Placeholder - Siap Diisi -->
                <div class="space-y-6">
                    <!-- Placeholder 1: Hero Section -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">📌 Hero Section / Banner Utama</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Area ini untuk mengelola banner/slider utama, teks sambutan, dan visual hero section yang menjadi first impression pengunjung website.
                        </p>
                    </div>

                    <!-- Placeholder 2: About Section -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">📖 Tentang Museum / About Section</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Kelola deskripsi singkat museum, visi misi, dan highlight informasi penting yang perlu diketahui pengunjung.
                        </p>
                    </div>

                    <!-- Placeholder 3: Featured Content -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">⭐ Konten Unggulan / Featured Items</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Pilih berita terbaru, koleksi terfavorit, atau konten lain yang ingin ditampilkan secara prominent di halaman beranda.
                        </p>
                    </div>

                    <!-- Placeholder 4: Call-to-Action -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">🎯 Call-to-Action (CTA)</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Atur tombol aksi utama, link penting, atau ajakan untuk pengunjung mengeksplorasi konten lebih lanjut.
                        </p>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-8 flex gap-3 border-t border-stone-100 pt-6">
                    <button type="button" class="inline-flex items-center space-x-2 bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Tambah Elemen Baru</span>
                    </button>
                    <button type="button" class="inline-flex items-center space-x-2 bg-stone-200 hover:bg-stone-300 text-stone-700 font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        <span>Kembali</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
