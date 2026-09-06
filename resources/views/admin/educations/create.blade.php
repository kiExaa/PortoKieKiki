@extends('admin.layout')
@section('title', 'Tambah Education')

@section('content')
<h1>Tambah Education</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.educations.store') }}">
    @csrf
    @include('admin.educations._form')
    <button type="submit">Simpan</button>
</form>
@endsection
