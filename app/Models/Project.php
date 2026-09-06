<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'type', 'short_description', 'description', 'problem',
        'solution', 'features', 'role', 'cover_image', 'project_url',
        'github_url', 'status', 'featured', 'sort_order',
    ];

    protected $casts = ['featured' => 'boolean'];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
