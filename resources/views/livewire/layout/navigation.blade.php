<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<!-- SIDEBAR UTAMA (Tetap Berada di Sisi Kiri Layar) -->
<!-- SIDEBAR UTAMA -->
<nav class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col bg-white border-r border-amber-200/60 shadow-sm font-sans">
    
    <!-- Bagian Atas: Logo & Identitas Museum -->
    <div class="flex h-16 shrink-0 items-center px-6 border-b border-stone-100">
        <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
            <x-application-logo class="h-8 w-auto fill-current text-amber-700" />
            <span class="text-sm font-black text-stone-800 tracking-tight uppercase">Admin Museum</span>
        </a>
    </div>

    <!-- Bagian Tengah: Daftar Menu Navigasi Vertikal -->
    <div class="flex flex-1 flex-col overflow-y-auto px-4 py-6 space-y-1.5">
        <span class="px-3 text-[10px] font-bold uppercase tracking-wider text-stone-400 mb-2 block">Menu Utama</span>
        
         <a href="{{ route('dashboard') }}" wire:navigate 
           class="group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 
                  {{ request()->routeIs('dashboard') ? 'bg-amber-50 text-amber-700 border-l-4 border-amber-600 pl-2.5' : 'text-stone-600 hover:bg-stone-50 hover:text-amber-700' }}">
            <svg class="mr-3 h-5 w-5 shrink-0 {{ request()->routeIs('dashboard') ? 'text-amber-600' : 'text-stone-400 group-hover:text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            {{ __('Dashboard') }}
        </a>

        <!-- 1. Beranda -->
        <a href="{{ route('admin.beranda.index') }}" wire:navigate 
   class="group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 
          {{ request()->routeIs('admin.beranda*') ? 'bg-amber-50 text-amber-700 border-l-4 border-amber-600 pl-2.5' : 'text-stone-600 hover:bg-stone-50 hover:text-amber-700' }}">
    <svg class="mr-3 h-5 w-5 shrink-0 {{ request()->routeIs('admin.beranda*') ? 'text-amber-600' : 'text-stone-400 group-hover:text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
    </svg>
    {{ __('Beranda') }}
</a>


        <!-- 2. Sejarah -->
        <a href="{{ route('admin.sejarah') }}" wire:navigate 
           class="group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 
                  {{ request()->routeIs('admin.sejarah') ? 'bg-amber-50 text-amber-700 border-l-4 border-amber-600 pl-2.5' : 'text-stone-600 hover:bg-stone-50 hover:text-amber-700' }}">
            <svg class="mr-3 h-5 w-5 shrink-0 {{ request()->routeIs('admin.sejarah') ? 'text-amber-600' : 'text-stone-400 group-hover:text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            {{ __('Sejarah') }}
        </a>

        <!-- 3. Visi & Misi -->
        <a href="{{ route('admin.visimisi') }}" wire:navigate 
           class="group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 
                  {{ request()->routeIs('admin.visimisi') ? 'bg-amber-50 text-amber-700 border-l-4 border-amber-600 pl-2.5' : 'text-stone-600 hover:bg-stone-50 hover:text-amber-700' }}">
            <svg class="mr-3 h-5 w-5 shrink-0 {{ request()->routeIs('admin.visimisi') ? 'text-amber-600' : 'text-stone-400 group-hover:text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            {{ __('Visi & Misi') }}
        </a>

        <!-- 4. Struktur Organisasi -->
        <a href="{{ route('admin.strukturorg') }}" wire:navigate 
           class="group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 
                  {{ request()->routeIs('admin.strukturorg') ? 'bg-amber-50 text-amber-700 border-l-4 border-amber-600 pl-2.5' : 'text-stone-600 hover:bg-stone-50 hover:text-amber-700' }}">
            <svg class="mr-3 h-5 w-5 shrink-0 {{ request()->routeIs('admin.strukturorg') ? 'text-amber-600' : 'text-stone-400 group-hover:text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
            {{ __('Struktur Organisasi') }}
        </a>

        <!-- 5. Galeri -->
        <a href="{{ route('admin.galeri.index') }}" wire:navigate 
   class="group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 
          {{ request()->routeIs('admin.galeri.index*') ? 'bg-amber-50 text-amber-700 border-l-4 border-amber-600 pl-2.5' : 'text-stone-600 hover:bg-stone-50 hover:text-amber-700' }}">
    <!-- Ikon Galeri Gambar Media -->
    <svg class="mr-3 h-5 w-5 shrink-0 {{ request()->routeIs('admin.galeri.index*') ? 'text-amber-600' : 'text-stone-400 group-hover:text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
    </svg>
    {{ __('Katalog Galeri') }}
</a>

        <!-- 6. Berita -->
       <a href="{{ route('admin.berita.index') }}" wire:navigate 
   class="group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 
          {{ request()->routeIs('admin.berita.index') ? 'bg-amber-50 text-amber-700 border-l-4 border-amber-600 pl-2.5' : 'text-stone-600 hover:bg-stone-50 hover:text-amber-700' }}">
    <svg class="mr-3 h-5 w-5 shrink-0 {{ request()->routeIs('admin.berita.index') ? 'text-amber-600' : 'text-stone-400 group-hover:text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125H3.375a1.125 1.125 0 0 1-1.125-1.125V5.625c0-.621.504-1.125 1.125-1.125H15.75m-3-1.5h.008v.008H12.75V3Zm0 3h.008v.008H12.75V6Zm0 6h.008v.008H12.75v-.008Zm0 3h.008v.008H12.75V15Z" />
    </svg>
    {{ __('Berita') }}
</a>
    </div>

    <!-- Bagian Bawah: Informasi Akun & Dropdown Pengaturan -->
    <div class="border-t border-stone-100 p-4 bg-stone-50/50">
        <!-- 
            PERBAIKAN UTAMA: 
            Mengubah `align="top"` menjadi `align="top-left"` agar posisi melayang box menu berada di sisi kanan sidebar.
            Menambahkan class kustom Tailwind `relative` untuk memastikan koordinat pembungkus terjaga.
        -->
        <x-dropdown align="top-left" width="48" class="w-full relative">
            <x-slot name="trigger">
                <button class="flex w-full items-center p-2 rounded-xl text-left hover:bg-amber-50/40 group transition-all duration-200">
                    <div class="flex flex-1 flex-col min-w-0">
                        <span class="text-xs font-bold text-stone-800 truncate" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></span>
                        <span class="text-[10px] text-stone-500 truncate">{{ auth()->user()->email }}</span>
                    </div>
                    <!-- PERBAIKAN: Memperbaiki kesalahan ketik URL xmlns pada SVG -->
                    <svg class="h-4 w-4 text-stone-400 group-hover:text-amber-600 shrink-0 ms-2 transform group-hover:translate-x-0.5 transition-transform" xmlns="http://w3.org" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10.75 5.51V16.5a.75.75 0 01-1.5 0V5.51L7.3 7.76a.75.75 0 11-1.1-1.02l3.25-3.5A.75.75 0 0110 3z" clip-rule="evenodd" />
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <!-- 
                    PERBAIKAN POSISI: 
                    Menambahkan kelas `absolute left-full bottom-0 ms-2 mb-0` untuk memaksa container 
                    melompat keluar dari batas sidebar menuju area konten sebelah kanan secara presisi.
                -->
                <div class="bg-white border border-amber-100 rounded-xl overflow-hidden shadow-xl absolute left-full bottom-0 ms-2 mb-0 w-48 animate-fade-in">
                    <x-dropdown-link :href="route('profile')" wire:navigate class="text-stone-700 hover:bg-amber-50/50 hover:text-amber-700 font-medium py-2.5">
                        {{ __('Pengaturan Profil') }}
                    </x-dropdown-link>

                    <button wire:click="logout" class="w-full text-start border-t border-stone-50">
                        <x-dropdown-link class="text-red-600 hover:bg-red-50 font-medium py-2.5">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </button>
                </div>
            </x-slot>
        </x-dropdown>
    </div>
</nav>


