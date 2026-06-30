<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeCard extends Model
{
    protected $fillable = ['title', 'description', 'icon_or_image', 'target_url', 'order_weight'];

    public function getResolvedTargetUrlAttribute(): string
    {
        $value = $this->target_url ?? '';

        if (empty($value)) {
            return url('/');
        }

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        if (str_starts_with($value, '/')) {
            return url($value);
        }

        return url('/' . ltrim($value, '/'));
    }
}
