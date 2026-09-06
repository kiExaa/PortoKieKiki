@extends('admin.layout')
@section('title', 'Tambah Sertifikat')

@section('content')
<h1>Tambah Sertifikat</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.certificates.store') }}" enctype="multipart/form-data">
    @csrf
    @include('admin.certificates._form')
    <button type="submit">Simpan</button>
</form>
@endsection
