<x-app-layout>
    <!-- Pembungkus Konten Utama dengan Latar Belakang Krem Khas Museum -->
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Bagian Judul Struktur Organisasi (Se-tema dengan Header Dashboard) -->
            <div data-aos="fade-down" data-aos-duration="800" class="mb-10 flex flex-col items-start">
                <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase">
                    Halaman Struktur Organisasi
                </span>
                <h1 class="text-3xl md:text-4xl font-black text-amber-700 tracking-tight leading-tight">
                    {{ __('Kelola Struktur Organisasi Museum') }}
                </h1>
                <p class="text-sm text-stone-500 mt-2">
                    Kelola hierarki organisasi, posisi, dan informasi jabatan di museum.
                </p>
            </div>

            <!-- Konten Kartu Utama (Warna Putih Bersih agar Pop-Out di Atas Krem) -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" 
                 class="bg-white border border-amber-200/60 overflow-hidden shadow-sm rounded-2xl p-8 hover:shadow-md transition-shadow duration-300">
                
                <!-- Indikator Status -->
                <div class="flex items-center space-x-4 border-b border-stone-100 pb-6 mb-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 border border-amber-200 text-amber-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-stone-800">Kelola Struktur Organisasi</h3>
                        <p class="text-xs text-stone-500">{{ __("Ruang kerja untuk mengelola hierarki dan informasi organisasi museum.") }}</p>
                    </div>
                </div>

                <!-- Area Konten Placeholder - Siap Diisi -->
                <div class="space-y-6">
                    <!-- Placeholder 1: Bagan Organisasi -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">🏛️ Bagan Organisasi Hierarki</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Kelola bagan organisasi visual yang menunjukkan hierarki struktur dari direktur hingga staff operasional museum.
                        </p>
                    </div>

                    <!-- Placeholder 2: Daftar Pejabat -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">📋 Daftar Pejabat & Jabatan</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Kelola data lengkap pejabat, nama, jabatan, unit kerja, dan kontak yang dapat diakses publik.
                        </p>
                    </div>

                    <!-- Placeholder 3: Deskripsi Posisi/Jabatan -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">🎯 Deskripsi Posisi & Tanggung Jawab</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Tetapkan deskripsi tugas, tanggung jawab, dan kompetensi yang diharapkan untuk setiap posisi.
                        </p>
                    </div>

                    <!-- Placeholder 4: Unit Kerja/Departemen -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">🗂️ Unit Kerja & Departemen</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Kelola informasi departemen/unit kerja, fungsi utama, dan anggota dalam setiap divisi organisasi.
                        </p>
                    </div>

                    <!-- Placeholder 5: Kontak Organisasi -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">📞 Kontak & Informasi Departemen</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Kelola informasi kontak untuk setiap departemen termasuk email, telepon, dan lokasi kantor.
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
