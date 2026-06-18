<?php

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

use function Livewire\Volt\state;

state([
    'name' => fn () => auth()->user()->name,
    'email' => fn () => auth()->user()->email
]);

$updateProfileInformation = function () {
    $user = Auth::user();

    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
    ]);

    $user->fill($validated);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    $this->dispatch('profile-updated', name: $user->name);
};

$sendVerification = function () {
    $user = Auth::user();

    if ($user->hasVerifiedEmail()) {
        $this->redirectIntended(default: route('dashboard', absolute: false));

        return;
    }

    $user->sendEmailVerificationNotification();

    Session::flash('status', 'verification-link-sent');
};

?>

<section class="font-sans">
    <header>
        <!-- Judul menggunakan warna batu gelap yang kuat -->
        <h2 class="text-lg font-bold text-stone-900">
            {{ __('Informasi Profil Operator') }}
        </h2>

        <!-- Deskripsi menggunakan warna teks stone-500 yang lembut -->
        <p class="mt-2 text-sm text-stone-500 leading-relaxed">
            {{ __("Perbarui informasi identitas profil dan alamat email resmi akun operator Anda di sini.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-5">
        <!-- Nama Lengkap -->
        <div>
            <label for="name" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">
                {{ __('Nama Lengkap') }}
            </label>
            <input wire:model="name" id="name" name="name" type="text" 
                   class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200" 
                   required autofocus autocomplete="name" placeholder="Nama Operator" />
            <x-input-error class="mt-2 text-xs text-red-600 font-medium" :messages="$errors->get('name')" />
        </div>

        <!-- Alamat Email -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">
                {{ __('Alamat Email Resmi') }}
            </label>
            <input wire:model="email" id="email" name="email" type="email" 
                   class="block w-full rounded-xl border border-stone-200 bg-stone-50/50 px-4 py-3 text-sm text-stone-800 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500 transition-all duration-200" 
                   required autocomplete="username" placeholder="nama@museumtalaga.org" />
            <x-input-error class="mt-2 text-xs text-red-600 font-medium" :messages="$errors->get('email')" />

            <!-- Sistem Notifikasi Verifikasi Email -->
            @if (auth()->user() instanceof MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-amber-50/50 border border-amber-200/50 rounded-xl">
                    <p class="text-xs text-stone-600 leading-relaxed">
                        {{ __('Alamat email Anda belum terverifikasi dengan benar.') }}

                        <button wire:click.prevent="sendVerification" class="block mt-1 font-bold text-amber-700 hover:text-amber-800 underline rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-semibold text-xs text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/50 inline-block">
                            {{ __('Tautan verifikasi baru telah berhasil dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Tombol Simpan & Pesan Sukses Berhasil Disimpan -->
        <div class="flex items-center gap-4 pt-2">
            <button type="submit" 
                    class="rounded-xl bg-amber-700 px-6 py-3 text-sm font-semibold text-white shadow-md hover:bg-amber-600 hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                {{ __('Simpan Profil') }}
            </button>

            <!-- Notifikasi teks berhasil disimpan bernuansa hijau alami pudar -->
            <x-action-message class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/50" on="profile-updated">
                {{ __('Perubahan berhasil disimpan.') }}
            </x-action-message>
        </div>
    </form>
</section>
