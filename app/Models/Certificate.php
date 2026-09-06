<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'title', 'issuer', 'issue_date', 'certificate_number', 'file_path',
        'thumbnail_path', 'featured', 'status', 'sort_order',
    ];

    protected $casts = ['featured' => 'boolean'];
}
