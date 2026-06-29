<x-app-layout>
    <!-- Pembungkus Konten Utama dengan Latar Belakang Krem Khas Museum -->
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Bagian Judul Visi & Misi (Se-tema dengan Header Dashboard) -->
            <div data-aos="fade-down" data-aos-duration="800" class="mb-10 flex flex-col items-start">
                <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase">
                    Halaman Visi & Misi
                </span>
                <h1 class="text-3xl md:text-4xl font-black text-amber-700 tracking-tight leading-tight">
                    {{ __('Kelola Visi & Misi Museum') }}
                </h1>
                <p class="text-sm text-stone-500 mt-2">
                    Perbarui pernyataan visi, misi, dan nilai-nilai inti yang memandu museum.
                </p>
            </div>

            <!-- Konten Kartu Utama (Warna Putih Bersih agar Pop-Out di Atas Krem) -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" 
                 class="bg-white border border-amber-200/60 overflow-hidden shadow-sm rounded-2xl p-8 hover:shadow-md transition-shadow duration-300">
                
                <!-- Indikator Status -->
                <div class="flex items-center space-x-4 border-b border-stone-100 pb-6 mb-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 border border-amber-200 text-amber-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-stone-800">Kelola Visi & Misi</h3>
                        <p class="text-xs text-stone-500">{{ __("Ruang kerja untuk mengelola pernyataan visi, misi, dan nilai-nilai museum.") }}</p>
                    </div>
                </div>

                <!-- Area Konten Placeholder - Siap Diisi -->
                <div class="space-y-6">
                    <!-- Placeholder 1: Pernyataan Visi -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">🎯 Pernyataan Visi</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Kelola pernyataan visi jangka panjang museum yang menggambarkan masa depan yang ingin dicapai dan aspirasi institusi.
                        </p>
                    </div>

                    <!-- Placeholder 2: Pernyataan Misi -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">📋 Pernyataan Misi</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Kelola pernyataan misi yang menjelaskan tujuan, fungsi, dan tanggung jawab museum dalam masyarakat.
                        </p>
                    </div>

                    <!-- Placeholder 3: Nilai-Nilai Inti (Core Values) -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">💎 Nilai-Nilai Inti (Core Values)</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Tentukan dan kelola nilai-nilai fundamental yang menjadi fondasi budaya organisasi dan pengambilan keputusan museum.
                        </p>
                    </div>

                    <!-- Placeholder 4: Tujuan Strategis -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">🗺️ Tujuan & Target Strategis</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Tetapkan target kuantitatif dan kualitatif serta strategi untuk mencapai visi dan misi museum.
                        </p>
                    </div>

                    <!-- Placeholder 5: Komitmen & Tanggung Jawab Sosial -->
                    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-bold text-stone-800">🤝 Komitmen & Tanggung Jawab Sosial</h4>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-1 rounded font-bold">Placeholder</span>
                        </div>
                        <p class="text-xs text-stone-500 leading-relaxed">
                            Jelaskan komitmen museum terhadap pendidikan, pelestarian budaya, dan kontribusi sosial kepada masyarakat.
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
