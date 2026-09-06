@extends('admin.layout')
@section('title', 'Certificates')

@section('content')
<h1>Certificates</h1>
<a href="{{ route('admin.certificates.create') }}">+ Tambah Sertifikat</a>

<table border="1" cellpadding="8" style="border-collapse:collapse;width:100%;margin-top:16px">
    <tr>
        <th>Preview</th>
        <th>Judul</th>
        <th>Issuer</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    @forelse ($certificates as $certificate)
        <tr>
            <td>
                @if ($certificate->file_path)
                    <img src="{{ asset('storage/' . $certificate->file_path) }}" width="100">
                @endif
            </td>
            <td>{{ $certificate->title }}</td>
            <td>{{ $certificate->issuer }}</td>
            <td>{{ $certificate->issue_date }}</td>
            <td>
                <a href="{{ route('admin.certificates.edit', $certificate) }}">Edit</a>
                <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus sertifikat ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">Belum ada sertifikat.</td></tr>
    @endforelse
</table>
@endsection
