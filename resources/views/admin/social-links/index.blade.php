@extends('admin.layout')
@section('title', 'Social Links')

@section('content')
<h1>Social Links</h1>
<a href="{{ route('admin.social-links.create') }}">+ Tambah Social Link</a>

<table border="1" cellpadding="8" style="border-collapse:collapse;width:100%;margin-top:16px">
    <tr>
        <th>Platform</th>
        <th>URL</th>
        <th>Aksi</th>
    </tr>
    @forelse ($socialLinks as $link)
        <tr>
            <td>{{ $link->platform }}</td>
            <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
            <td>
                <a href="{{ route('admin.social-links.edit', $link) }}">Edit</a>
                <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="3">Belum ada data.</td></tr>
    @endforelse
</table>
@endsection
