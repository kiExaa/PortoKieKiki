@extends('admin.layout')
@section('title', 'Edit Dokumen')

@section('content')
<h1>Edit Dokumen</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.documents.update', $document) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.documents._form')
    <button type="submit">Simpan</button>
</form>
@endsection
