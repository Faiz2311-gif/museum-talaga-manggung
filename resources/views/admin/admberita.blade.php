<x-app-layout>
    <!-- Pembungkus Konten Utama dengan Latar Belakang Krem Khas Museum -->
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Bagian Judul Berita (Se-tema dengan Header Dashboard) -->
            <div data-aos="fade-down" data-aos-duration="800" class="mb-10 flex flex-col items-start">
                <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase">
                    Halaman Berita
                </span>
                <h1 class="text-3xl md:text-4xl font-black text-amber-700 tracking-tight leading-tight">
                    {{ __('Kelola Berita & Artikel Museum') }}
                </h1>
                <p class="text-sm text-stone-500 mt-2">
                    Buat, edit, publikasikan, dan kelola berita serta artikel kegiatan museum.
                </p>
            </div>

            <!-- Konten Kartu Utama (Warna Putih Bersih agar Pop-Out di Atas Krem) -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" 
                 class="bg-white border border-amber-200/60 overflow-hidden shadow-sm rounded-2xl p-8 hover:shadow-md transition-shadow duration-300">
                
                <!-- Indikator Status -->
                <div class="flex items-center space-x-4 border-b border-stone-100 pb-6 mb-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 border border-amber-200 text-amber-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125H3.375a1.125 1.125 0 0 1-1.125-1.125V5.625c0-.621.504-1.125 1.125-1.125H15.75m-3-1.5h.008v.008H12.75V3Zm0 3h.008v.008H12.75V6Zm0 6h.008v.008H12.75v-.008Zm0 3h.008v.008H12.75V15Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-stone-800">Kelola Berita & Artikel</h3>
                        <p class="text-xs text-stone-500">{{ __("Ruang kerja untuk membuat dan mengelola konten berita museum.") }}</p>
                    </div>
                </div>

                <!-- Area Konten Placeholder - Siap Diisi -->
                <div class="space-y-6">
                    <!-- Placeholder 1: Daftar Berita -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">📰 Daftar Berita Terpublikasi</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Tampilkan daftar lengkap semua berita yang sudah dipublikasikan dengan filter, search, dan sorting options.
                        </p>
                    </div>

                    <!-- Placeholder 2: Editor Berita -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">✏️ Editor & Pembuat Berita</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Akses editor WYSIWYG lengkap untuk membuat dan mengedit konten berita dengan formatting dan media support.
                        </p>
                    </div>

                    <!-- Placeholder 3: Manajemen Kategori & Tag -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">🏷️ Kategori & Tag Berita</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Buat dan kelola kategori berita seperti "Kegiatan", "Pengumuman", "Penelitian", "Event" untuk organisasi konten.
                        </p>
                    </div>

                    <!-- Placeholder 4: Drafts & Scheduling -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">📅 Draft & Penjadwalan Publikasi</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Simpan berita sebagai draft, atur jadwal publikasi otomatis, dan kelola status publikasi (draft/terbit/arsip).
                        </p>
                    </div>

                    <!-- Placeholder 5: Featured & Meta SEO -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">⭐ Featured & Optimasi SEO</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Pilih berita featured di homepage, kelola thumbnail, meta description, dan optimasi SEO untuk setiap artikel.
                        </p>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-8 flex gap-3 border-t border-stone-100 pt-6">
                    <button type="button" class="inline-flex items-center space-x-2 bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Tulis Berita Baru</span>
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
