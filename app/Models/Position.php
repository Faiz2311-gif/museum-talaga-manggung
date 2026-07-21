<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    // KOREKSI UTAMA: Daftarkan 'title' (bukan name) dan izinkan kolom 'image' diisi massal
    protected $fillable = [
        'title',       // Mengikuti file migrasi Anda yang memakai $table->string('title')
        'role',
        'image',       // WAJIB: Agar file gambar diizinkan masuk ke database
        'description',
        'parent_id',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Position::class, 'parent_id');
    }

    public function allChildren(): HasMany
    {
        return $this->children()->with('allChildren');
    }
}
