<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state('token')->locked();

state([
    'email' => fn () => request()->string('email')->value(),
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'token' => ['required'],
    'email' => ['required', 'string', 'email'],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$resetPassword = function () {
    $this->validate();

    // Here we will attempt to reset the user's password. If it is successful we
    // will update the password on an actual user model and persist it to the
    // database. Otherwise we will parse the error and return the response.
    $status = Password::reset(
        $this->only('email', 'password', 'password_confirmation', 'token'),
        function ($user) {
            $user->forceFill([
                'password' => Hash::make($this->password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        }
    );

    // If the password was successfully reset, we will redirect the user back to
    // the application's home authenticated view. If there is an error we can
    // redirect them back to where they came from with their error message.
    if ($status != Password::PASSWORD_RESET) {
        $this->addError('email', __($status));

        return;
    }

    Session::flash('status', __($status));

    $this->redirectRoute('login', navigate: true);
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
                Atur ulang kata sandi Anda untuk memulihkan akses akun.
            </p>
        </div>

        <!-- Kartu Form Konten (Warna Putih Bersih agar Kontras di Atas Krem) -->
        <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300">
            
            <form wire:submit="resetPassword" class="space-y-5">
                <!-- Alamat Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2 font-sans">
                        {{ __('Email Operator') }}
                    </label>
                    <input wire:model="email" id="email" type="email" name="email" required autofocus autocomplete="username"
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="nama@museumtalaga.org" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Kata Sandi Baru -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2 font-sans">
                        {{ __('Kata Sandi Baru') }}
                    </label>
                    <input wire:model="password" id="password" type="password" name="password" required autocomplete="new-password"
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Konfirmasi Kata Sandi Baru -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2 font-sans">
                        {{ __('Konfirmasi Kata Sandi') }}
                    </label>
                    <input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Tombol Submit Utama -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full rounded-xl bg-amber-700 px-6 py-3.5 text-sm font-semibold text-white shadow-md hover:bg-amber-600 hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                        {{ __('Perbarui Kata Sandi') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Tombol Kembali ke Halaman Login -->
        <div class="text-center mt-6">
            <a href="{{ route('login') }}" wire:navigate class="inline-flex items-center text-xs font-semibold text-stone-500 hover:text-amber-700 transition-colors">
                <span aria-hidden="true" class="me-1">←</span> Kembali ke Halaman Login
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
