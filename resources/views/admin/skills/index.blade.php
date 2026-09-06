@extends('admin.layout')
@section('title', 'Skills')

@section('content')
<h1>Skills</h1>
<a href="{{ route('admin.skills.create') }}">+ Tambah Skill</a>

<table border="1" cellpadding="8" style="border-collapse:collapse;width:100%;margin-top:16px">
    <tr>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
    @forelse ($skills as $skill)
        <tr>
            <td>{{ $skill->name }}</td>
            <td>{{ $skill->category }}</td>
            <td>
                <a href="{{ route('admin.skills.edit', $skill) }}">Edit</a>
                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
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
