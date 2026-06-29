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
                
                <!-- Indikator Berhasil Masuk Bergaya Minimalis -->
                <div class="flex items-center space-x-4 border-b border-stone-100 pb-6 mb-6">
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
    <!-- ================= GRAFIK DATA OPERASIONAL ================= -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8 font-sans">
    <!-- Grafik 1: Tren Pengunjung (Lebar 2 Kolom pada Layar Besar) -->
    <div class="lg:col-span-2 bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl shadow-sm">
        <div class="flex flex-col mb-4">
            <span class="text-[10px] font-bold uppercase tracking-wider text-amber-600">Statistik Kunjungan</span>
            <h4 class="text-sm font-bold text-stone-800 mt-0.5">Tren Pengunjung Pekan Ini</h4>
        </div>
        <div class="h-64 relative">
            <canvas id="chartPengunjung"></canvas>
        </div>
    </div>

    <!-- Grafik 2: Komposisi Kategori Berita (Lebar 1 Kolom) -->
    <div class="bg-stone-50/60 border border-stone-200/70 p-6 rounded-xl shadow-sm flex flex-col justify-between">
        <div class="flex flex-col mb-4">
            <span class="text-[10px] font-bold uppercase tracking-wider text-amber-600">Statistik Publikasi</span>
            <h4 class="text-sm font-bold text-stone-800 mt-0.5">Distribusi Kategori Berita</h4>
        </div>
        <div class="h-56 flex items-center justify-center relative">
            <canvas id="chartBerita"></canvas>
        </div>
    </div>
</div>
<!-- =========================================================== -->


    <!-- Script Pengaktif Animasi Masuk AOS & Pustaka Chart.js -->
   <!-- Pustaka Chart.js -->
<script src="https://jsdelivr.net"></script>

<script>
    // 1. Grafik Pengunjung (Line Chart)
    const ctxPengunjung = document.getElementById('chartPengunjung').getContext('2d');
    new Chart(ctxPengunjung, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Jumlah Pengunjung',
                data:, // Data sampel kunjungan harian
                borderColor: '#b45309', // Warna Amber-700
                backgroundColor: 'rgba(180, 83, 9, 0.05)',
                borderWidth: 2.5,
                tension: 0.35,
                fill: true,
                pointBackgroundColor: '#b45309'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { grid: { display: true, color: '#f3f4f6' } },
                x: { grid: { display: false } }
            }
        }
    });

    // 2. Grafik Kategori Berita (Doughnut Chart)
    const ctxBerita = document.getElementById('chartBerita').getContext('2d');
    new Chart(ctxBerita, {
        type: 'doughnut',
        data: {
            labels: ['Konservasi', 'Edukasi', 'Eksibisi'],
            datasets: [{
                data:, // Data sampel jumlah artikel berita
                backgroundColor: ['#b45309', '#d97706', '#78716c'], // Palet warna Amber & Stone
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { boxWidth: 12, font: { size: 11 } }
                }
            },
            cutout: '70%' // Membuat struktur lingkaran cincin donut yang tipis
        }
    });
</script>

</x-app-layout>
