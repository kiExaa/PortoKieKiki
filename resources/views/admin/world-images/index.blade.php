@extends('admin.layout')
@section('title', 'World Images')

@section('content')
<h1>My World — Gallery</h1>

<form method="GET" action="{{ route('admin.world-images.index') }}">
    <label>Pilih Item:</label>
    <select name="item" onchange="this.form.submit()">
        <option value="">-- pilih item --</option>
        @foreach ($items as $item)
            <option value="{{ $item->id }}" {{ (string) $selectedItemId === (string) $item->id ? 'selected' : '' }}>
                {{ $item->title }}
            </option>
        @endforeach
    </select>
</form>

@if ($selectedItemId)
    <hr>
    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    @if ($errors->any())
        <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    @endif

    <h3>Upload Foto Baru</h3>
    <form method="POST" action="{{ route('admin.world-images.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="world_item_id" value="{{ $selectedItemId }}">
        <label>Pilih beberapa foto sekaligus (boleh multi-select)</label><br>
        <input type="file" name="images[]" accept="image/*" multiple required><br><br>
        <label>Caption (berlaku untuk semua foto yang diupload)</label><br>
        <input type="text" name="caption"><br><br>
        <button type="submit">Upload</button>
    </form>

    <h3>Galeri</h3>
    <div style="display:flex;flex-wrap:wrap;gap:12px">
        @forelse ($images as $image)
            <div style="border:1px solid #ccc;padding:8px">
                <img src="{{ asset('storage/' . $image->image_path) }}" width="150"><br>
                {{ $image->caption }}<br>
                <form action="{{ route('admin.world-images.destroy', $image) }}" method="POST" onsubmit="return confirm('Yakin hapus foto ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </div>
        @empty
            <p>Belum ada foto di item ini.</p>
        @endforelse
    </div>
@endif
@endsection
