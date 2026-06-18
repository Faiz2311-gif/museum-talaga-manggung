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
        
        <!-- Link Dashboard -->
        <a href="{{ route('dashboard') }}" wire:navigate 
           class="group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 
                  {{ request()->routeIs('dashboard') ? 'bg-amber-50 text-amber-700 border-l-4 border-amber-600 pl-2.5' : 'text-stone-600 hover:bg-stone-50 hover:text-amber-700' }}">
            <svg class="mr-3 h-5 w-5 shrink-0 {{ request()->routeIs('dashboard') ? 'text-amber-600' : 'text-stone-400 group-hover:text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            {{ __('Dashboard') }}
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


