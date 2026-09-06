@extends('admin.layout')
@section('title', 'Documents')

@section('content')
<h1>Documents</h1>
<a href="{{ route('admin.documents.create') }}">+ Tambah Dokumen</a>

<table border="1" cellpadding="8" style="border-collapse:collapse;width:100%;margin-top:16px">
    <tr>
        <th>Judul</th>
        <th>Tipe</th>
        <th>Download?</th>
        <th>File</th>
        <th>Aksi</th>
    </tr>
    @forelse ($documents as $document)
        <tr>
            <td>{{ $document->title }}</td>
            <td>{{ $document->type === 'cv' ? 'CV' : 'Riwayat Hidup' }}</td>
            <td>{{ $document->download_enabled ? 'Ya' : 'Tidak' }}</td>
            <td><a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">Lihat file</a></td>
            <td>
                <a href="{{ route('admin.documents.edit', $document) }}">Edit</a>
                <form action="{{ route('admin.documents.destroy', $document) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">Belum ada dokumen.</td></tr>
    @endforelse
</table>
@endsection
