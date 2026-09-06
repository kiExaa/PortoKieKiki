@extends('admin.layout')
@section('title', 'Projects')

@section('content')
<h1>Projects</h1>
<a href="{{ route('admin.projects.create') }}">+ Tambah Project</a>

<table border="1" cellpadding="8" style="border-collapse:collapse;width:100%;margin-top:16px">
    <tr>
        <th>Judul</th>
        <th>Status</th>
        <th>Featured</th>
        <th>Aksi</th>
    </tr>
    @forelse ($projects as $project)
        <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->status }}</td>
            <td>{{ $project->featured ? 'Ya' : 'Tidak' }}</td>
            <td>
                <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus project ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">Belum ada project.</td></tr>
    @endforelse
</table>
@endsection
