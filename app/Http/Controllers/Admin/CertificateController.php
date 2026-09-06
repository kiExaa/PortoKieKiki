<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController
{
    public function index()
    {
        $certificates = Certificate::orderBy('sort_order')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'issue_date' => 'nullable|string|max:255',
            'certificate_number' => 'nullable|string|max:255',
            'file' => 'required|image|max:5120',
            'featured' => 'nullable|boolean',
        ]);

        $path = $request->file('file')->store('certificates', 'public');

        Certificate::create([
            'title' => $validated['title'],
            'issuer' => $validated['issuer'] ?? null,
            'issue_date' => $validated['issue_date'] ?? null,
            'certificate_number' => $validated['certificate_number'] ?? null,
            'file_path' => $path,
            'featured' => $request->boolean('featured'),
            'status' => 'active',
        ]);

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'issue_date' => 'nullable|string|max:255',
            'certificate_number' => 'nullable|string|max:255',
            'file' => 'nullable|image|max:5120',
            'featured' => 'nullable|boolean',
        ]);

        if ($request->hasFile('file')) {
            if ($certificate->file_path) {
                Storage::disk('public')->delete($certificate->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('certificates', 'public');
        }

        $validated['featured'] = $request->boolean('featured');
        unset($validated['file']);

        $certificate->update($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->file_path) {
            Storage::disk('public')->delete($certificate->file_path);
        }
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat berhasil dihapus.');
    }
}
