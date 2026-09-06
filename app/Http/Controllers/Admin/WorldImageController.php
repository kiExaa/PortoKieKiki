<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorldImage;
use App\Models\WorldItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorldImageController
{
    public function index(Request $request)
    {
        $items = WorldItem::orderBy('title')->get();

        $selectedItemId = $request->query('item');
        $images = collect();
        if ($selectedItemId) {
            $images = WorldImage::where('world_item_id', $selectedItemId)->orderBy('sort_order')->get();
        }

        return view('admin.world-images.index', [
            'items' => $items,
            'images' => $images,
            'selectedItemId' => $selectedItemId,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'world_item_id' => 'required|exists:world_items,id',
            'images' => 'required|array',
            'images.*' => 'image|max:5120',
            'caption' => 'nullable|string|max:255',
        ]);

        foreach ($request->file('images') as $file) {
            $path = $file->store('world-images', 'public');
            WorldImage::create([
                'world_item_id' => $validated['world_item_id'],
                'image_path' => $path,
                'caption' => $validated['caption'] ?? null,
            ]);
        }

        return redirect()->route('admin.world-images.index', ['item' => $validated['world_item_id']])
            ->with('success', 'Foto berhasil diupload.');
    }

    public function destroy(WorldImage $worldImage)
    {
        $itemId = $worldImage->world_item_id;

        if ($worldImage->image_path) {
            Storage::disk('public')->delete($worldImage->image_path);
        }
        $worldImage->delete();

        return redirect()->route('admin.world-images.index', ['item' => $itemId])
            ->with('success', 'Foto berhasil dihapus.');
    }
}
