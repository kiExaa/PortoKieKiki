@extends('admin.layout')
@section('title', 'Edit Skill')

@section('content')
<h1>Edit Skill</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.skills.update', $skill) }}">
    @csrf
    @method('PUT')
    @include('admin.skills._form')
    <button type="submit">Simpan</button>
</form>
@endsection
