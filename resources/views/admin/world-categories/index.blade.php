@extends('admin.layout')
@section('title', 'World Categories')

@section('content')
<h1>My World — Categories</h1>
<a href="{{ route('admin.world-categories.create') }}">+ Tambah Kategori</a>

<table border="1" cellpadding="8" style="border-collapse:collapse;width:100%;margin-top:16px">
    <tr>
        <th>Nama</th>
        <th>Jumlah Item</th>
        <th>Aksi</th>
    </tr>
    @forelse ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->items_count }}</td>
            <td>
            <a href="{{ route('admin.world-categories.edit', $category) }}">Edit</a>
            </td>
        </tr>
    @empty
        <tr><td colspan="3">Belum ada kategori.</td></tr>
    @endforelse
</table>
@endsection
