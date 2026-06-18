<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state([
    'name' => '',
    'email' => '',
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$register = function () {
    $validated = $this->validate();

    $validated['password'] = Hash::make($validated['password']);

    event(new Registered($user = User::create($validated)));

    Auth::login($user);

    $this->redirect(route('dashboard', absolute: false), navigate: true);
};

?>

<!-- Pembungkus Utama Mengikuti Struktur dan Animasi Halaman Login Museum -->
<div class="w-full max-w-md px-4 py-8 mx-auto">
    
    <!-- Link AOS jika diperlukan di halaman ini -->
    <link rel="stylesheet" href="https://unpkg.com" />

    <div data-aos="fade-up" data-aos-duration="1000">
        <!-- Logo / Identitas Atas Form -->
        <div class="text-center mb-8 flex flex-col items-center">
            <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] uppercase font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 font-sans">
                Pendaftaran Akun Operator
            </span>
            <h2 class="text-3xl font-black text-amber-700 tracking-tight leading-tight">
                Museum Talaga Manggung
            </h2>
            <p class="font-sans text-xs text-stone-500 mt-2">
                Buat kredensial baru untuk manajemen sistem arsip digital.
            </p>
        </div>

        <!-- Kartu Form Konten (Warna Putih Bersih agar Kontras di Atas Krem) -->
        <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300">
            <form wire:submit="register" class="space-y-5">
                
                <!-- Nama Lengkap -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2 font-sans">
                        {{ __('Nama Lengkap') }}
                    </label>
                    <input wire:model="name" id="name" type="text" name="name" required autofocus autocomplete="name"
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="Nama Operator" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Alamat Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2 font-sans">
                        {{ __('Email Instansi') }}
                    </label>
                    <input wire:model="email" id="email" type="email" name="email" required autocomplete="username"
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="nama@museumtalaga.org" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Kata Sandi -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2 font-sans">
                        {{ __('Kata Sandi Baru') }}
                    </label>
                    <input wire:model="password" id="password" type="password" name="password" required autocomplete="new-password"
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Konfirmasi Kata Sandi -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2 font-sans">
                        {{ __('Konfirmasi Kata Sandi') }}
                    </label>
                    <input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Navigasi Balik ke Login & Tombol Submit -->
                <div class="flex items-center justify-between pt-2">
                    <a class="text-xs font-semibold text-stone-500 hover:text-amber-700 transition-colors rounded focus:outline-none focus:ring-2 focus:ring-amber-500" 
                       href="{{ route('login') }}" wire:navigate>
                        {{ __('Sudah terdaftar?') }}
                    </a>

                    <button type="submit" 
                            class="rounded-xl bg-amber-700 px-6 py-3 text-sm font-semibold text-white shadow-md hover:bg-amber-600 hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                        {{ __('Daftar Akun') }}
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

    <!-- Script Pengaktif Animasi Masuk AOS -->
    <script src="https://unpkg.com"></script>
    <script>
        AOS.init({
            once: true,
            easing: 'ease-out-cubic'
        });
    </script>
</div>

