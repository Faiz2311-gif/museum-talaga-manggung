<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $fillable = ['slug', 'content'];

    public static function value(string $slug, string $default = ''): string
    {
        $item = static::where('slug', $slug)->first();

        return $item?->content ?? $default;
    }
}
