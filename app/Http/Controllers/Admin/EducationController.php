<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController
{
    public function index()
    {
        $educations = Education::orderBy('sort_order')->get();
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'major' => 'nullable|string|max:255',
            'degree' => 'nullable|string|max:255',
            'start_year' => 'required|string|max:255',
            'end_year' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        $validated['status'] = 'active';

        Education::create($validated);

        return redirect()->route('admin.educations.index')->with('success', 'Education berhasil ditambahkan.');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'major' => 'nullable|string|max:255',
            'degree' => 'nullable|string|max:255',
            'start_year' => 'required|string|max:255',
            'end_year' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $education->update($validated);

        return redirect()->route('admin.educations.index')->with('success', 'Education berhasil diperbarui.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.educations.index')->with('success', 'Education berhasil dihapus.');
    }
}
