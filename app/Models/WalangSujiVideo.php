<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalangSujiVideo extends Model
{
    protected $fillable = [
        'title',
        'duration',
        'sort_order',
        'video_url',
        'video_file_path',
        'thumbnail_path',
        'description',
        'guide_pdf_path',
    ];
}
