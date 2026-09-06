@extends('admin.layout')
@section('title', 'World Items')

@section('content')
<h1>My World — Items</h1>
<a href="{{ route('admin.world-items.create') }}">+ Tambah Item</a>

<table border="1" cellpadding="8" style="border-collapse:collapse;width:100%;margin-top:16px">
    <tr>
        <th>Preview</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
    @forelse ($items as $item)
        <tr>
            <td>
                @if ($item->preview_image)
                    <img src="{{ asset('storage/' . $item->preview_image) }}" width="100">
                @endif
            </td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->category->name }}</td>
            <td>
                <a href="{{ route('admin.world-items.edit', $item) }}">Edit</a>
                &nbsp;|&nbsp;
                <a href="{{ route('admin.world-images.index', ['item' => $item->id]) }}">Kelola Foto</a>
                &nbsp;|&nbsp;
                <form action="{{ route('admin.world-items.destroy', $item) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus? Semua foto di item ini ikut terhapus.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">Belum ada item.</td></tr>
    @endforelse
</table>
@endsection
