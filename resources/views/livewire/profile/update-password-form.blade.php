<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state([
    'current_password' => '',
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'current_password' => ['required', 'string', 'current_password'],
    'password' => ['required', 'string', Password::defaults(), 'confirmed'],
]);

$updatePassword = function () {
    try {
        $validated = $this->validate();
    } catch (ValidationException $e) {
        $this->reset('current_password', 'password', 'password_confirmation');

        throw $e;
    }

    Auth::user()->update([
        'password' => Hash::make($validated['password']),
    ]);

    $this->reset('current_password', 'password', 'password_confirmation');

    $this->dispatch('password-updated');
};

?>

<section class="font-sans">
    <header>
        <!-- Judul menggunakan warna batu gelap yang kuat -->
        <h2 class="text-lg font-bold text-stone-900">
            {{ __('Perbarui Kata Sandi Akun') }}
        </h2>

        <!-- Deskripsi menggunakan warna teks stone-500 yang lembut -->
        <p class="mt-2 text-sm text-stone-500 leading-relaxed">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk menjaga keamanan akses data arsip.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-5">
        <!-- Kata Sandi Saat Ini -->
        <div>
            <label for="update_password_current_password" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">
                {{ __('Kata Sandi Saat Ini') }}
            </label>
            <input wire:model="current_password" id="update_password_current_password" name="current_password" type="password" 
                   class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200" 
                   autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2 text-xs text-red-600 font-medium" />
        </div>

        <!-- Kata Sandi Baru -->
        <div>
            <label for="update_password_password" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">
                {{ __('Kata Sandi Baru') }}
            </label>
            <input wire:model="password" id="update_password_password" name="password" type="password" 
                   class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200" 
                   autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-600 font-medium" />
        </div>

        <!-- Konfirmasi Kata Sandi Baru -->
        <div>
            <label for="update_password_password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">
                {{ __('Konfirmasi Kata Sandi Baru') }}
            </label>
            <input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password" 
                   class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200" 
                   autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-600 font-medium" />
        </div>

        <!-- Tombol Simpan & Pesan Sukses Berhasil Disimpan -->
        <div class="flex items-center gap-4 pt-2">
            <button type="submit" 
                    class="rounded-xl bg-amber-700 px-6 py-3 text-sm font-semibold text-white shadow-md hover:bg-amber-600 hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                {{ __('Simpan Sandi') }}
            </button>

            <!-- Notifikasi teks berhasil disimpan bernuansa hijau alami pudar -->
            <x-action-message class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/50" on="password-updated">
                {{ __('Berhasil disimpan.') }}
            </x-action-message>
        </div>
    </form>
</section>
