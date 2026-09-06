<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorldCategory extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'cover_image', 'sort_order', 'status'];

    public function items()
    {
        return $this->hasMany(WorldItem::class);
    }
}
