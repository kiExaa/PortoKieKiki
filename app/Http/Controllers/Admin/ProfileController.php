<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController
{
    public function edit()
{
    $profile = Profile::firstOrCreate([], [
        'full_name' => 'Khairul Rizki',
        'professional_title' => 'IT & Web Developer',
    ]);

    return view('admin.profile.edit', compact('profile'));
}

public function update(Request $request)
{
    $validated = $request->validate([
        'full_name' => 'required|string|max:255',
        'professional_title' => 'required|string|max:255',
        'phone' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:255',
        'location' => 'nullable|string|max:255',
        'short_bio' => 'nullable|string',
        'about' => 'nullable|string',
        'profile_image' => 'nullable|image|max:5120',
        'about_image' => 'nullable|image|max:5120',
    ]);

    $profile = Profile::firstOrFail();

    if ($request->hasFile('profile_image')) {
        if ($profile->profile_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($profile->profile_image);
        }
        $validated['profile_image'] = $request->file('profile_image')->store('profile', 'public');
    }

    if ($request->hasFile('about_image')) {
        if ($profile->about_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($profile->about_image);
        }
        $validated['about_image'] = $request->file('about_image')->store('profile', 'public');
    }

    $profile->update($validated);

    return redirect()->route('admin.profile.edit')->with('success', 'Profile berhasil disimpan.');
}
}
