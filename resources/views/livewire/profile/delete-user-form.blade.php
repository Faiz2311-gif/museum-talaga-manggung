<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;

use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state(['password' => '']);

rules(['password' => ['required', 'string', 'current_password']]);

$deleteUser = function (Logout $logout) {
    $this->validate();

    tap(Auth::user(), $logout(...))->delete();

    $this->redirect('/', navigate: true);
};

?>

<section class="space-y-6 font-sans">
    <header>
        <!-- Judul menggunakan warna batu gelap yang kuat -->
        <h2 class="text-lg font-bold text-stone-900">
            {{ __('Hapus Akun Operator') }}
        </h2>

        <!-- Deskripsi menggunakan warna teks stone-500 yang lembut -->
        <p class="mt-2 text-sm text-stone-500 leading-relaxed">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan data di dalamnya akan dihapus secara permanen. Sebelum menghapus akun, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <!-- Tombol Pemicu Utama (Desain Merah Lembut Premium khas Museum) -->
    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="rounded-xl bg-red-600 px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-white shadow-sm hover:bg-red-700 hover:shadow transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
    >
        {{ __('Hapus Akun Permanen') }}
    </button>

    <!-- Struktur Modal Pop-Up Pengonfirmasian -->
    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <!-- Memaksa warna latar modal tetap putih bersih dengan border emas amber tipis -->
        <form wire:submit="deleteUser" class="p-8 bg-white border border-amber-200/50 rounded-2xl shadow-xl">

            <h2 class="text-lg font-black text-stone-900 tracking-tight">
                {{ __('Apakah Anda yakin ingin menghapus akun?') }}
            </h2>

            <p class="mt-3 text-sm text-stone-500 leading-relaxed">
                {{ __('Tindakan ini tidak dapat dibatalkan. Semua arsip operasional yang terikat secara personal akan terhapus. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun secara permanen.') }}
            </p>

            <!-- Input Box Sandi Konfirmasi -->
            <div class="mt-6">
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">
                    {{ __('Kata Sandi Konfirmasi') }}
                </label>

                <input
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full sm:w-3/4 rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200"
                    placeholder="Masukkan Kata Sandi Anda"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-600 font-medium" />
            </div>

            <!-- Tombol Aksi di Dalam Modal -->
            <div class="mt-8 flex items-center justify-end space-x-3">
                <!-- Tombol Batal/Cancel -->
                <button 
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="rounded-xl border border-stone-200 bg-white px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-stone-600 hover:bg-stone-50 hover:text-stone-800 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-stone-500 focus:ring-offset-2"
                >
                    {{ __('Batal') }}
                </button>

                <!-- Tombol Konfirmasi Hapus Akun -->
                <button 
                    type="submit"
                    class="rounded-xl bg-red-600 px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-white shadow-sm hover:bg-red-700 hover:shadow transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                >
                    {{ __('Ya, Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>

