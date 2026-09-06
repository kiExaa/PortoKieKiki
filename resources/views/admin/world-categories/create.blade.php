@extends('admin.layout')
@section('title', 'Tambah Kategori')

@section('content')
<h1>Tambah Kategori</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.world-categories.store') }}">
    @csrf
    @include('admin.world-categories._form')
    <button type="submit">Simpan</button>
</form>
@endsection
