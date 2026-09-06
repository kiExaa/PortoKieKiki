@extends('layouts.public')
@section('title', $profile->full_name ?? 'Portfolio')

@section('content')

<section style="position:relative; overflow:hidden; padding:100px 24px 120px;">

    <svg width="100%" height="100%" viewBox="0 0 1200 700" preserveAspectRatio="xMidYMid slice"
         style="position:absolute; inset:0; opacity:0.4; pointer-events:none;">
        <circle cx="120" cy="100" r="3" fill="#0ABBCF"/>
        <circle cx="280" cy="60" r="2" fill="#0ABBCF"/>
        <circle cx="1050" cy="140" r="3" fill="#0ABBCF"/>
        <circle cx="1120" cy="380" r="2" fill="#0ABBCF"/>
        <circle cx="950" cy="550" r="2.5" fill="#F2A93B"/>
        <circle cx="150" cy="500" r="2" fill="#0ABBCF"/>
        <circle cx="80" cy="620" r="2.5" fill="#F2A93B"/>
        <line x1="120" y1="100" x2="280" y2="60" stroke="#0ABBCF" stroke-width="0.5"/>
        <line x1="1050" y1="140" x2="1120" y2="380" stroke="#0ABBCF" stroke-width="0.5"/>
        <line x1="950" y1="550" x2="1120" y2="380" stroke="#F2A93B" stroke-width="0.5"/>
        <line x1="150" y1="500" x2="80" y2="620" stroke="#0ABBCF" stroke-width="0.5"/>
    </svg>

    <div class="container" style="position:relative; display:flex; gap:48px; align-items:center; flex-wrap:wrap;">

        <div style="flex:1; min-width:320px;">
            <div class="mono" style="color:var(--cyan); font-size:14px; margin-bottom:14px;">
                {{ $profile->professional_title ?? 'IT & Web Developer' }}
            </div>
            <h1 style="font-size:52px; color:var(--mist); margin-bottom:20px;">
                {{ $profile->full_name ?? 'Khairul Rizki' }}
            </h1>
            <p style="color:var(--muted); font-size:16px; max-width:420px; margin-bottom:32px;">
                {{ $profile->short_bio ?? 'Membangun web dengan Laravel, sekaligus mengajak kamu masuk ke duniaku — profesional dan personal.' }}
            </p>
            <div style="display:flex; gap:14px; flex-wrap:wrap;">
                <a href="/world" style="background:var(--cyan); color:var(--ink); padding:12px 22px; border-radius:6px; font-weight:600;">
                    Explore My World
                </a>
                <a href="#projects" style="border:1px solid var(--amber); color:var(--amber); padding:12px 22px; border-radius:6px; font-weight:600;">
                    View Projects
                </a>
                @if ($profile->email)
                <a href="#contact" style="border:1px solid rgba(231,243,245,0.3); color:var(--mist); padding:12px 22px; border-radius:6px; font-weight:600;">
                    View CV
                </a>
                @endif
            </div>
        </div>

        <div style="flex-shrink:0;">
            @if ($profile->profile_image)
                <img src="{{ asset('storage/' . $profile->profile_image) }}"
                     style="width:280px; height:360px; object-fit:cover; border-radius:12px; border:1px solid rgba(10,187,207,0.25);">
            @else
                <div style="width:280px; height:360px; background:var(--surface); border-radius:12px; display:flex; align-items:center; justify-content:center; color:var(--muted);" class="mono">
                    [Foto Hero belum diupload]
                </div>
            @endif
        </div>

    </div>
</section>

@endsection
