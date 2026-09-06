<?php

namespace App\Http\Controllers;

use App\Models\WorldCategory;
use App\Models\WorldItem;

class WorldController
{
    public function index()
    {
        $categories = WorldCategory::withCount('items')->orderBy('sort_order')->get();
        return view('public.world-index', compact('categories'));
    }

    public function category(WorldCategory $category)
    {
        $items = $category->items()->orderBy('sort_order')->get();
        return view('public.world-category', compact('category', 'items'));
    }

    public function item(WorldItem $item)
    {
        $item->load('category', 'images');
        return view('public.world-item', compact('item'));
    }
}
