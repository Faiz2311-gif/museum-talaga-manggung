@php
$footerCol1Title = \App\Models\HomeSection::value('footer_col1_title', 'Museum Talaga Manggung');
$footerCol1Text = \App\Models\HomeSection::value('footer_col1_text', 'Wadah pelestarian benda pusaka, manuskrip kuno, dan rekam jejak sejarah peradaban institusi.');
$footerCol1Copyright = \App\Models\HomeSection::value('footer_col1_copyright', '© 2026 Hak Cipta Dilindungi.');
$footerCol2Title = \App\Models\HomeSection::value('footer_col2_title', 'Akses Pintasan');
$footerCol2Links = \App\Models\HomeSection::value('footer_col2_links', "Beranda|/\nBerita|/berita\nGaleri|/galeri\nGosali|/gosali");
$footerCol3Title = \App\Models\HomeSection::value('footer_col3_title', 'Informasi Hukum');
$footerCol3Links = \App\Models\HomeSection::value('footer_col3_links', "Kebijakan Privasi|#\nSyarat & Ketentuan Penggunaan|#\nBantuan & Kontak Resmi|#");

$parseLinks = function (string $raw): array {
    $items = [];
    foreach (preg_split('/\R/', trim($raw)) ?: [] as $line) {
        $parts = array_map('trim', explode('|', $line, 2));
        if (count($parts) === 2 && $parts[0] !== '') {
            $items[] = $parts;
        }
    }

    return $items;
};

$footerCol2Items = $parseLinks($footerCol2Links);
$footerCol3Items = $parseLinks($footerCol3Links);
@endphp

<footer class="bg-[#1c1917] text-stone-400 text-xs py-12 border-t border-stone-800 font-sans mt-auto w-full overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
        <div class="flex flex-col justify-between space-y-2">
            <div>
                <h3 class="text-white font-serif font-black text-sm tracking-tight mb-2">{{ $footerCol1Title }}</h3>
                <p class="text-stone-500 leading-relaxed text-[11px]">{{ $footerCol1Text }}</p>
            </div>
            <p class="text-stone-600 pt-4 md:pt-0">{{ $footerCol1Copyright }}</p>
        </div>

        <div class="flex flex-col space-y-2.5">
            <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-1">{{ $footerCol2Title }}</h4>
            <div class="grid grid-cols-2 gap-x-4 gap-y-2 max-w-xs mx-auto md:mx-0 text-left">
                @foreach($footerCol2Items as [$label, $url])
                    <a href="{{ $url }}" class="hover:text-white hover:underline transition">{{ $label }}</a>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col space-y-2.5">
            <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-1">{{ $footerCol3Title }}</h4>
            <ul class="space-y-2">
                @foreach($footerCol3Items as [$label, $url])
                    <li><a href="{{ $url }}" class="hover:text-white transition">{{ $label }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>
