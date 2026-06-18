<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://bunny.net" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <!-- PERBAIKAN: Mengunci warna dasar body menggunakan warna krem museum agar tidak ada bocor hitam -->
    <body class="font-sans antialiased bg-[#fdfbf2]">
        
        <!-- PERBAIKAN: Mengganti bg-gray-100 dan dark:bg-gray-900 dengan warna krem hangat museum -->
        <div class="min-h-screen bg-[#fdfbf2]">
            
            <!-- Komponen Navigasi (Sekarang bertindak sebagai Sidebar Kiri) -->
            <livewire:layout.navigation />

            <!-- 
                PERBAIKAN UTAMA: 
                Membungkus seluruh konten utama (Header & Slot) ke dalam div dengan kelas `pl-64`.
                Ini bertujuan agar konten otomatis bergeser ke kanan dan tidak tertabrak oleh Sidebar.
            -->
            <div class="pl-64 transition-all duration-300">
                
                <!-- Page Heading (Opsional, sudah dibersihkan dari warna gelap bawaan) -->
                @if (isset($header))
                    <header class="bg-white border-b border-amber-200/60 shadow-sm">
                        <div class="max-w-7xl mx-auto py-6 px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content (Dashboard / Profile) -->
                <main>
                    {{ $slot }}
                </main>
                
            </div>
        </div>
    </body>
</html>
