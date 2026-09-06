@extends('admin.layout')
@section('title', 'Tambah Skill')

@section('content')
<h1>Tambah Skill</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.skills.store') }}">
    @csrf
    @include('admin.skills._form')
    <button type="submit">Simpan</button>
</form>
@endsection
