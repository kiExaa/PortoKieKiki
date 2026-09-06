<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorldImage extends Model
{
    protected $fillable = ['world_item_id', 'image_path', 'caption', 'sort_order'];

    public function item()
    {
        return $this->belongsTo(WorldItem::class, 'world_item_id');
    }
}
