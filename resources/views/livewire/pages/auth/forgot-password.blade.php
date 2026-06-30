<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state(['email' => '']);

rules(['email' => ['required', 'string', 'email']]);

$sendPasswordResetLink = function () {
    $this->validate();

    // We will send the password reset link to this user. Once we have attempted
    // to send the link, we will examine the response then see the message we
    // need to show to the user. Finally, we'll send out a proper response.
    $status = Password::sendResetLink(
        $this->only('email')
    );

    if ($status != Password::RESET_LINK_SENT) {
        $this->addError('email', __($status));

        return;
    }

    $this->reset('email');

    Session::flash('status', __($status));
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
                Pemulihan Akses Akun Operator
            </p>
        </div>

        <!-- Kartu Form Konten (Warna Putih Bersih agar Kontras di Atas Krem) -->
        <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300">
            
            <!-- Teks Penjelasan Utama -->
            <p class="text-sm leading-relaxed text-stone-600 mb-6 font-sans">
                {{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan pembuatan ulang kata sandi yang memungkinkan Anda memilih kata sandi baru.') }}
            </p>

            <!-- Status Sesi (Notifikasi Berhasil Kirim Link) -->
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <form wire:submit="sendPasswordResetLink" class="space-y-5">
                <!-- Alamat Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2 font-sans">
                        {{ __('Email Operator') }}
                    </label>
                    <input wire:model="email" id="email" type="email" name="email" required autofocus
                           class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                           placeholder="nama@museumtalaga.org" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-600 font-medium" />
                </div>

                <!-- Tombol Submit Utama -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full rounded-xl bg-amber-700 px-6 py-3.5 text-sm font-semibold text-white shadow-md hover:bg-amber-600 hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                        {{ __('Kirim Tautan Atur Ulang Sandi') }}
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
