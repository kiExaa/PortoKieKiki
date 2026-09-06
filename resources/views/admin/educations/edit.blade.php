@extends('admin.layout')
@section('title', 'Edit Education')

@section('content')
<h1>Edit Education</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.educations.update', $education) }}">
    @csrf
    @method('PUT')
    @include('admin.educations._form')
    <button type="submit">Simpan</button>
</form>
@endsection
