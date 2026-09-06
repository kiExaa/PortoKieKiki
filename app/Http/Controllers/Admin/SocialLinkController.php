<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController
{
    public function index()
    {
        $socialLinks = SocialLink::orderBy('sort_order')->get();
        return view('admin.social-links.index', compact('socialLinks'));
    }

    public function create()
    {
        return view('admin.social-links.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'label' => 'nullable|string|max:255',
            'url' => ['required', 'regex:/^(https?:\/\/|mailto:).+/'],
            'icon' => 'nullable|string|max:255',
        ]);
        $validated['status'] = 'active';

        SocialLink::create($validated);

        return redirect()->route('admin.social-links.index')->with('success', 'Social link berhasil ditambahkan.');
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.social-links.edit', compact('socialLink'));
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'label' => 'nullable|string|max:255',
            'url' => ['required', 'regex:/^(https?:\/\/|mailto:).+/'],
            'icon' => 'nullable|string|max:255',
        ]);

        $socialLink->update($validated);

        return redirect()->route('admin.social-links.index')->with('success', 'Social link berhasil diperbarui.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('admin.social-links.index')->with('success', 'Social link berhasil dihapus.');
    }
}
