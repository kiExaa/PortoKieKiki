@extends('admin.layout')
@section('title', 'Tambah Project')

@section('content')
<h1>Tambah Project</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.projects.store') }}">
    @csrf
    @include('admin.projects._form')
    <button type="submit">Simpan</button>
</form>
@endsection
