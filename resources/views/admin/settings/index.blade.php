@extends('admin.layout')
@section('title', 'Settings')

@section('content')
<h1>Settings</h1>

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@php
    $spotify = $settings->firstWhere('key', 'spotify_playlist_url');
@endphp

<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf
    @method('PUT')

    <label>Spotify Playlist URL</label><br>
    <input type="text" name="spotify_playlist_url" value="{{ old('spotify_playlist_url', $spotify->value ?? '') }}" style="width:400px" placeholder="https://open.spotify.com/playlist/..."><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
