<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Khairul Rizki') — IT & Web Developer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Plus+Jakarta+Sans:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
    :root {
        --ink: #081619;
        --surface: #0F262B;
        --surface-2: #123742;
        --cyan: #0ABBCF;
        --amber: #F2A93B;
        --mist: #E7F3F5;
        --muted: #7FA3A8;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
        background: var(--ink);
        color: var(--mist);
        font-family: 'Plus Jakarta Sans', sans-serif;
        line-height: 1.6;
    }
    h1, h2, h3 { font-family: 'Space Grotesk', sans-serif; font-weight: 700; line-height: 1.15; }
    .mono { font-family: 'JetBrains Mono', monospace; }
    a { color: var(--cyan); text-decoration: none; }
    .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }

    .navbar {
        position: sticky; top: 0; z-index: 50;
        display: flex; justify-content: space-between; align-items: center;
        padding: 20px 24px;
        background: rgba(8, 22, 25, 0.85);
        backdrop-filter: blur(8px);
        border-bottom: 1px solid rgba(10, 187, 207, 0.15);
    }
    .navbar .logo { font-family: 'Space Grotesk', sans-serif; font-weight: 700; color: var(--mist); font-size: 18px; }
    .navbar nav { display: flex; gap: 24px; font-family: 'JetBrains Mono', monospace; font-size: 13px; }
    .navbar nav a { color: var(--muted); }
    .navbar nav a:hover { color: var(--cyan); }
    .navbar .cta {
        background: var(--cyan); color: var(--ink); padding: 8px 16px;
        border-radius: 6px; font-weight: 600; font-size: 13px;
    }

    footer {
        border-top: 1px solid rgba(10, 187, 207, 0.15);
        padding: 40px 24px; text-align: center;
        color: var(--muted); font-size: 13px;
    }
</style>
</head>
@php
    $spotifyUrl = \App\Models\Setting::where('key', 'spotify_playlist_url')->value('value');
@endphp

<body>

<div class="navbar">
    <div class="logo">KR.</div>
    <nav>
        <a href="#about">About</a>
        <a href="#education">Education</a>
        <a href="#experience">Experience</a>
        <a href="#skills">Skills</a>
        <a href="#projects">Projects</a>
        <a href="#certificates">Certificates</a>
        <a href="#contact">Contact</a>
    </nav>
    <a href="/world" class="cta">Explore My World</a>
</div>

@yield('content')

<footer>
    &copy; {{ date('Y') }} Khairul Rizki — Built with Laravel
</footer>

@if ($spotifyUrl)
<div style="position:fixed; bottom:24px; right:24px; z-index:100;">

    <div id="spotify-panel" style="display:none; margin-bottom:12px; background:var(--surface); border:1px solid rgba(10,187,207,0.25); border-radius:12px; padding:12px; width:300px; box-shadow:0 8px 30px rgba(0,0,0,0.5);">
        <iframe style="border-radius:8px;" src="{{ str_replace('open.spotify.com/', 'open.spotify.com/embed/', $spotifyUrl) }}"
                width="100%" height="152" frameborder="0" allowfullscreen=""
                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
        </iframe>
    </div>

    <button onclick="document.getElementById('spotify-panel').style.display = document.getElementById('spotify-panel').style.display === 'none' ? 'block' : 'none';"
            style="width:56px; height:56px; border-radius:50%; background:var(--cyan); border:none; cursor:pointer; box-shadow:0 4px 20px rgba(10,187,207,0.5); display:flex; align-items:center; justify-content:center;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M9 18V6l12-2v12" stroke="#081619" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="6" cy="18" r="3" stroke="#081619" stroke-width="1.8"/>
            <circle cx="18" cy="16" r="3" stroke="#081619" stroke-width="1.8"/>
        </svg>
    </button>

</div>
@endif

</body>
</html>
