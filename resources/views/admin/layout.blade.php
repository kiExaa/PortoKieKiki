<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin — @yield('title', 'Dashboard')</title>
</head>
<body style="display:flex;font-family:sans-serif">
    <nav style="width:200px;padding:16px;border-right:1px solid #ccc">
        <strong>Admin CMS</strong>
        <ul style="list-style:none;padding:0;margin-top:16px;line-height:2">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.profile.edit') }}">Profile</a></li>
            <li><a href="{{ route('admin.projects.index') }}">Projects</a></li>
            <li><a href="{{ route('admin.certificates.index') }}">Certificates</a></li>
            <li><a href="{{ route('admin.educations.index') }}">Education</a></li>
            <li><a href="{{ route('admin.experiences.index') }}">Experience</a></li>
            <li><a href="{{ route('admin.skills.index') }}">Skills</a></li>
            <li><a href="{{ route('admin.world-categories.index') }}">My World</a></li>
            <li><a href="{{ route('admin.world-categories.index') }}">World Categories</a></li>
            <li><a href="{{ route('admin.world-items.index') }}">World Items</a></li>
            <li><a href="{{ route('admin.world-images.index') }}">World Gallery</a></li>
            <li><a href="{{ route('admin.settings.index') }}">Settings</a></li>
        </ul>
        <form method="POST" action="{{ route('logout') }}" style="margin-top:24px">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    <main style="padding:24px;flex:1">
        @if (session('success'))
            <div style="color:green;margin-bottom:12px">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
