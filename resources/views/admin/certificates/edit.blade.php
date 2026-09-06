@extends('admin.layout')
@section('title', 'Edit Sertifikat')

@section('content')
<h1>Edit Sertifikat</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.certificates.update', $certificate) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.certificates._form')
    <button type="submit">Simpan</button>
</form>
@endsection
