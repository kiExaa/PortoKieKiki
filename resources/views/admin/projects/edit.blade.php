@extends('admin.layout')
@section('title', 'Edit Project')

@section('content')
<h1>Edit Project</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.projects.update', $project) }}">
    @csrf
    @method('PUT')
    @include('admin.projects._form')
    <button type="submit">Simpan</button>
</form>
@endsection
