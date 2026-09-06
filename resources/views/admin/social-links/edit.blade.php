@extends('admin.layout')
@section('title', 'Edit Social Link')

@section('content')
<h1>Edit Social Link</h1>
@if ($errors->any())
    <ul style="color:red">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('admin.social-links.update', $socialLink) }}">
    @csrf
    @method('PUT')
    @include('admin.social-links._form')
    <button type="submit">Simpan</button>
</form>
@endsection
