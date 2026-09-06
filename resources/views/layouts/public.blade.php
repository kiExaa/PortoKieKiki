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

</body>
</html>
