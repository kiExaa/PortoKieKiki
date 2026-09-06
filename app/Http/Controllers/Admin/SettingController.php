<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'spotify_playlist_url' => 'nullable|url',
        ]);

        // updateOrCreate = kalau key sudah ada, update; kalau belum, buat baru
        Setting::updateOrCreate(
            ['key' => 'spotify_playlist_url'],
            ['value' => $validated['spotify_playlist_url'], 'type' => 'url']
        );

        return redirect()->route('admin.settings.index')->with('success', 'Settings berhasil disimpan.');
    }
}
