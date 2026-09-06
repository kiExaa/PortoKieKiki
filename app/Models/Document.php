<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title', 'type', 'file_path', 'thumbnail_path',
        'preview_enabled', 'download_enabled', 'status',
    ];

    protected $casts = ['preview_enabled' => 'boolean', 'download_enabled' => 'boolean'];
}
