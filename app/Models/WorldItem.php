<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorldItem extends Model
{
    protected $fillable = [
        'world_category_id', 'title', 'description', 'preview_image', 'sort_order', 'status',
    ];

    public function category()
    {
        return $this->belongsTo(WorldCategory::class, 'world_category_id');
    }

    public function images()
    {
        return $this->hasMany(WorldImage::class);
    }
}
