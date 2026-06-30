<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;

layout('layouts.guest');

$sendVerification = function () {
    if (Auth::user()->hasVerifiedEmail()) {
        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);

        return;
    }

    Auth::user()->sendEmailVerificationNotification();

    Session::flash('status', 'verification-link-sent');
};

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
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
                Verifikasi Email Operator
            </p>
        </div>

        <!-- Kartu Konten (Warna Putih Bersih agar Kontras di Atas Krem) -->
        <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300 text-center">
            
            <!-- Teks Penjelasan Utama -->
            <p class="text-sm leading-relaxed text-stone-600 mb-6 font-sans">
                {{ __('Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan. Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan yang baru.') }}
            </p>

            <!-- Notifikasi Status Jika Email Berhasil Dikirim Ulang -->
            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-xs font-semibold text-emerald-800 tracking-wide">
                    {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
                </div>
            @endif

            <!-- Tombol Aksi Utama -->
            <div class="space-y-4 pt-2">
                <button wire:click="sendVerification" type="button"
                        class="w-full rounded-xl bg-amber-700 px-6 py-3.5 text-sm font-semibold text-white shadow-md hover:bg-amber-600 hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </button>
            </div>
        </div>

        <!-- Tombol Keluar / Log Out -->
        <div class="text-center mt-6">
            <button wire:click="logout" type="button" 
                    class="inline-flex items-center text-xs font-semibold text-stone-500 hover:text-red-600 transition-colors focus:outline-none focus:underline">
                Keluar dari Akun <span aria-hidden="true" class="ms-1">→</span>
            </button>
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

