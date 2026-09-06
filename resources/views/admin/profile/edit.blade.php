@extends('admin.layout')
@section('title', 'Profile')

@section('content')
<h1>Edit Profile</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nama Lengkap</label><br>
    <input type="text" name="full_name" value="{{ old('full_name', $profile->full_name) }}" required><br><br>

    <label>Professional Title</label><br>
    <input type="text" name="professional_title" value="{{ old('professional_title', $profile->professional_title) }}" required><br><br>

    <label>Phone</label><br>
    <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email', $profile->email) }}"><br><br>

    <label>Location</label><br>
    <input type="text" name="location" value="{{ old('location', $profile->location) }}"><br><br>

    <label>Short Bio</label><br>
    <textarea name="short_bio" rows="2" style="width:100%">{{ old('short_bio', $profile->short_bio) }}</textarea><br><br>

    <label>About (cerita lengkap)</label><br>
    <textarea name="about" rows="6" style="width:100%">{{ old('about', $profile->about) }}</textarea><br><br>

    <label>Foto Hero (untuk section paling atas)</label><br>
    @if ($profile->profile_image)
        <img src="{{ asset('storage/' . $profile->profile_image) }}" width="150"><br>
    @endif
    <input type="file" name="profile_image" accept="image/*"><br><br>

    <label>Foto About (untuk section Tentang Saya)</label><br>
    @if ($profile->about_image)
        <img src="{{ asset('storage/' . $profile->about_image) }}" width="150"><br>
    @endif
    <input type="file" name="about_image" accept="image/*"><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
