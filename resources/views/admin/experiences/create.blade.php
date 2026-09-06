@extends('admin.layout')
@section('title', 'Tambah Experience')

@section('content')
<h1>Tambah Experience</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.experiences.store') }}">
    @csrf
    @include('admin.experiences._form')
    <button type="submit">Simpan</button>
</form>
@endsection
