@extends('admin.layout')
@section('title', 'Edit Item')

@section('content')
<h1>Edit Item</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.world-items.update', $item) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.world-items._form')
    <button type="submit">Simpan</button>
</form>
@endsection
