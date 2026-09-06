<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorldItem;
use App\Models\WorldCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorldItemController
{
    public function index()
    {
        $items = WorldItem::with('category')->orderBy('world_category_id')->orderBy('sort_order')->get();
        return view('admin.world-items.index', compact('items'));
    }

    public function create()
    {
        $categories = WorldCategory::orderBy('sort_order')->get();
        return view('admin.world-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'world_category_id' => 'required|exists:world_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'preview_image' => 'required|image|max:5120',
        ]);

        $path = $request->file('preview_image')->store('world-items', 'public');

        WorldItem::create([
            'world_category_id' => $validated['world_category_id'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'preview_image' => $path,
            'status' => 'active',
        ]);

        return redirect()->route('admin.world-items.index')->with('success', 'Item berhasil ditambahkan.');
    }

    public function edit(WorldItem $worldItem)
    {
        $categories = WorldCategory::orderBy('sort_order')->get();
        return view('admin.world-items.edit', ['item' => $worldItem, 'categories' => $categories]);
    }

    public function update(Request $request, WorldItem $worldItem)
    {
        $validated = $request->validate([
            'world_category_id' => 'required|exists:world_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'preview_image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('preview_image')) {
            if ($worldItem->preview_image) {
                Storage::disk('public')->delete($worldItem->preview_image);
            }
            $validated['preview_image'] = $request->file('preview_image')->store('world-items', 'public');
        }

        $worldItem->update($validated);

        return redirect()->route('admin.world-items.index')->with('success', 'Item berhasil diperbarui.');
    }

    public function destroy(WorldItem $worldItem)
    {
        if ($worldItem->preview_image) {
            Storage::disk('public')->delete($worldItem->preview_image);
        }
        $worldItem->delete();
        return redirect()->route('admin.world-items.index')->with('success', 'Item berhasil dihapus.');
    }
}
