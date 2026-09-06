@extends('admin.layout')
@section('title', 'Tambah Dokumen')

@section('content')
<h1>Tambah Dokumen</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data">
    @csrf
    @include('admin.documents._form')
    <button type="submit">Simpan</button>
</form>
@endsection
