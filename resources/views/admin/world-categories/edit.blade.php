@extends('admin.layout')
@section('title', 'Edit Kategori')

@section('content')
<h1>Edit Kategori</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.world-categories.update', $category) }}">
    @csrf
    @method('PUT')
    @include('admin.world-categories._form')
    <button type="submit">Simpan</button>
</form>
@endsection
