@extends('admin.layout')
@section('title', 'Tambah Social Link')

@section('content')
<h1>Tambah Social Link</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.social-links.store') }}">
    @csrf
    @include('admin.social-links._form')
    <button type="submit">Simpan</button>
</form>
@endsection
