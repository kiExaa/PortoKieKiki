<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorldCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorldCategoryController
{
    public function index()
    {
        $categories = WorldCategory::withCount('items')->orderBy('sort_order')->get();
        return view('admin.world-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.world-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $validated['slug'] = Str::slug($request->name);
        $validated['status'] = 'active';

        WorldCategory::create($validated);

        return redirect()->route('admin.world-categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(WorldCategory $worldCategory)
    {
        return view('admin.world-categories.edit', ['category' => $worldCategory]);
    }

    public function update(Request $request, WorldCategory $worldCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $worldCategory->update($validated);

        return redirect()->route('admin.world-categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }
}
