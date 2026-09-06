@extends('admin.layout')
@section('title', 'Education')

@section('content')
<h1>Education</h1>
<a href="{{ route('admin.educations.create') }}">+ Tambah Education</a>

<table border="1" cellpadding="8" style="border-collapse:collapse;width:100%;margin-top:16px">
    <tr>
        <th>Institusi</th>
        <th>Jurusan</th>
        <th>Tahun</th>
        <th>Aksi</th>
    </tr>
    @forelse ($educations as $education)
        <tr>
            <td>{{ $education->institution }}</td>
            <td>{{ $education->major }}</td>
            <td>{{ $education->start_year }} - {{ $education->end_year ?? 'Sekarang' }}</td>
            <td>
                <a href="{{ route('admin.educations.edit', $education) }}">Edit</a>
                <form action="{{ route('admin.educations.destroy', $education) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
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
