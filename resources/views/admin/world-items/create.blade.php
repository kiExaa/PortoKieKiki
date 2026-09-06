@extends('admin.layout')
@section('title', 'Tambah Item')

@section('content')
<h1>Tambah Item</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.world-items.store') }}" enctype="multipart/form-data">
    @csrf
    @include('admin.world-items._form')
    <button type="submit">Simpan</button>
</form>
@endsection
