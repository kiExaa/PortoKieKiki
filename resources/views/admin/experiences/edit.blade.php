@extends('admin.layout')
@section('title', 'Edit Experience')

@section('content')
<h1>Edit Experience</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.experiences.update', $experience) }}">
    @csrf
    @method('PUT')
    @include('admin.experiences._form')
    <button type="submit">Simpan</button>
</form>
@endsection
