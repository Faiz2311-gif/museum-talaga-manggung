<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.guest');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
};

?>

<!-- Pembungkus Utama Menggunakan Latar Belakang Krem Hangat (#fdfbf2) -->
<div class="min-h-screen bg-[#fdfbf2] flex flex-col justify-center items-center px-6 py-12">
    
    <!-- Link AOS diletakkan di sini jika layout guest Anda belum memuatnya -->
    <link rel="stylesheet" href="https://unpkg.com" />

    <div data-aos="fade-up" data-aos-duration="1000" class="w-full max-w-md">
        <!-- Logo / Identitas Atas Form -->
        <div class="text-center mb-8 flex flex-col items-center">
            <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] uppercase font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 font-sans">
                Portal Otentikasi Admin
            </span>
            <h2 class="text-3xl font-black text-amber-700 tracking-tight leading-tight">
                Museum Talaga Manggung
            </h2>
            <p class="font-sans text-xs text-stone-500 mt-2">
                Silakan masuk untuk mengelola katalog, arsip digital, dan berita.
            </p>
        </div>

        <!-- Kartu Form Konten (Warna Putih Bersih agar Kontras di Atas Krem) -->
        <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300">
            
            <!-- Status Sesi (Notifikasi Laravel jika ada) -->
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <form wire:submit="login" class="space-y-5">
                <!-- Alamat Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2 font-sans">
                        {{ __('Email Operator') }}
                    </label>
                    <input wire:model="form.email" id="email" type="email" name="email" required autofocus autocomplete="username"
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="nama@museumtalaga.org" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Kata Sandi -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-stone-700 font-sans">
                            {{ __('Kata Sandi') }}
                        </label>
                    </div>
                    <input wire:model="form.password" id="password" type="password" name="password" required autocomplete="current-password"
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Opsi Remember Me & Lupa Password -->
                <div class="flex items-center justify-between pt-1">
                    <label for="remember" class="inline-flex items-center cursor-pointer select-none">
                        <input wire:model="form.remember" id="remember" type="checkbox" name="remember" 
                               class="rounded border-stone-300 text-amber-700 shadow-sm focus:ring-amber-500 focus:ring-offset-white w-4 h-4">
                        <span class="ms-2 text-xs font-medium text-stone-600 hover:text-stone-800 transition-colors">{{ __('Ingat Saya') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-xs font-semibold text-stone-500 hover:text-amber-700 transition-colors rounded focus:outline-none focus:ring-2 focus:ring-amber-500" 
                           href="{{ route('password.request') }}" wire:navigate>
                            {{ __('Lupa Sandi?') }}
                        </a>
                    @endif
                </div>

                <!-- Tombol Submit Utama -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full rounded-xl bg-amber-700 px-6 py-3.5 text-sm font-semibold text-white shadow-md hover:bg-amber-600 hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                        {{ __('Masuk ke Dashboard') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Tombol Kembali ke Halaman Utama -->
        <div class="text-center mt-6">
            <a href="/" class="inline-flex items-center text-xs font-semibold text-stone-500 hover:text-amber-700 transition-colors">
                <span aria-hidden="true" class="me-1">←</span> Kembali ke Beranda Museum
            </a>
        </div>
    </div>

    <!-- Script Pengaktif Animasi Masuk -->
    <script src="https://unpkg.com"></script>
    <script>
        AOS.init({
            once: true,
            easing: 'ease-out-cubic'
        });
    </script>
</div>
