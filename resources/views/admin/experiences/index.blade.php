@extends('admin.layout')
@section('title', 'Experience')

@section('content')
<h1>Experience</h1>
<a href="{{ route('admin.experiences.create') }}">+ Tambah Experience</a>

<table border="1" cellpadding="8" style="border-collapse:collapse;width:100%;margin-top:16px">
    <tr>
        <th>Judul</th>
        <th>Organisasi</th>
        <th>Periode</th>
        <th>Aksi</th>
    </tr>
    @forelse ($experiences as $experience)
        <tr>
            <td>{{ $experience->title }}</td>
            <td>{{ $experience->organization }}</td>
            <td>{{ $experience->start_date }} - {{ $experience->end_date ?? 'Sekarang' }}</td>
            <td>
                <a href="{{ route('admin.experiences.edit', $experience) }}">Edit</a>
                <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">Belum ada data.</td></tr>
    @endforelse
</table>
@endsection
