<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $galeri->judul }} - Galeri Museum Talaga Manggung</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-amber-50 text-stone-900 antialiased font-sans min-h-screen flex flex-col">
    <header class="border-b border-amber-200 bg-white/80 backdrop-blur sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between gap-4">
            <div class="flex items-center font-sans tracking-wide shrink-0">
                <a href="{{ url('/') }}" class="block hover:opacity-90 transition">
                    <img src="{{ Vite::asset('resources/images/image_ee43ecbd.svg') }}"
                         alt="Museum Talaga Manggung"
                         class="h-auto max-h-12 w-auto object-contain" />
                </a>
            </div>
            <nav class="hidden md:flex items-center space-x-6 text-xs md:text-sm font-medium text-stone-600 whitespace-nowrap ml-auto">
                <a href="{{ url('/') }}" class="hover:text-amber-700 transition">Beranda</a>
                <a href="{{ route('galeri') }}" class="text-amber-600 hover:text-amber-700 transition">Katalog</a>
                <a href="{{ route('berita.index') }}" class="hover:text-amber-700 transition">Berita</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow max-w-7xl w-full mx-auto px-6 py-12">
        <div class="mb-8">
            <a href="{{ route('galeri') }}" class="inline-flex items-center text-sm font-medium text-amber-700 hover:text-amber-800">
                ← Kembali ke Galeri
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_0.8fr] gap-8 items-start">
            <div class="bg-white rounded-3xl shadow-sm border border-stone-200/70 overflow-hidden">
                <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full h-[420px] object-cover">
            </div>

            <div class="space-y-6">
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-[0.25em] text-amber-600">{{ $galeri->kategori }}</p>
                    <h1 class="text-3xl md:text-4xl font-black text-stone-900 mt-2 leading-tight">{{ $galeri->judul }}</h1>
                </div>

                <div class="bg-white rounded-2xl border border-stone-200/70 p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-stone-800">Deskripsi</h2>
                    <p class="mt-3 text-sm leading-7 text-stone-600">
                        {{ $galeri->deskripsi ?: 'Belum ada deskripsi untuk koleksi ini.' }}
                    </p>
                </div>

                @if($galeri->link_3d)
                    <a href="{{ $galeri->link_3d }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center w-full bg-amber-700 hover:bg-amber-800 text-white font-semibold px-4 py-3 rounded-2xl transition">
                        Lihat Model 3D
                    </a>
                @endif
            </div>
        </div>

        @if($related->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-stone-800 mb-6">Galeri Terkait</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($related as $item)
                        <a href="{{ route('galeri.show', $item) }}" class="group bg-white rounded-2xl border border-stone-200/70 overflow-hidden shadow-sm hover:shadow-md transition">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-40 object-cover group-hover:scale-105 transition duration-300">
                            <div class="p-4">
                                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-amber-600">{{ $item->kategori }}</p>
                                <h3 class="mt-1 text-sm font-semibold text-stone-800">{{ $item->judul }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </main>

    <footer class="bg-[#1c1917] text-stone-400 text-xs py-12 border-t border-stone-800 font-sans mt-auto w-full">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-stone-500">&copy; 2026 Museum Talaga Manggung</p>
        </div>
    </footer>
</body>
</html>
