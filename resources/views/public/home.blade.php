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

<section id="about" style="padding:100px 24px;">
    <div class="container" style="display:flex; gap:48px; align-items:center; flex-wrap:wrap;">
        <div style="flex-shrink:0;">
            @if ($profile->about_image)
                <img src="{{ asset('storage/' . $profile->about_image) }}"
                     style="width:260px; height:340px; object-fit:cover; border-radius:12px; border:1px solid rgba(10,187,207,0.2);">
            @endif
        </div>
        <div style="flex:1; min-width:300px;">
            <div class="mono" style="color:var(--amber); font-size:14px; margin-bottom:14px;">tentang saya</div>
            <h2 style="font-size:32px; color:var(--mist); margin-bottom:20px;">Perjalanan Saya</h2>
            <p style="color:var(--muted); line-height:1.8;">
                {{ $profile->about ?? 'Cerita belum diisi.' }}
            </p>
        </div>
    </div>
</section>

<section id="education" style="padding:100px 24px; background:var(--surface);">
    <div class="container">
        <div class="mono" style="color:var(--cyan); font-size:14px; margin-bottom:14px;">perjalanan pendidikan</div>
        <h2 style="font-size:32px; color:var(--mist); margin-bottom:40px;">Education</h2>

        <div style="position:relative; padding-left:28px; border-left:1px solid rgba(10,187,207,0.25);">
            @forelse ($educations as $education)
                <div style="position:relative; margin-bottom:36px;">
                    <div style="position:absolute; left:-34px; top:4px; width:10px; height:10px; border-radius:50%; background:var(--cyan);"></div>
                    <div class="mono" style="color:var(--muted); font-size:13px; margin-bottom:6px;">
                        {{ $education->start_year }} — {{ $education->end_year ?? 'Sekarang' }}
                    </div>
                    <h3 style="font-size:20px; color:var(--mist); margin-bottom:4px;">{{ $education->institution }}</h3>
                    <div style="color:var(--muted);">{{ $education->major }}</div>
                    @if ($education->description)
                        <p style="color:var(--muted); margin-top:8px; max-width:600px;">{{ $education->description }}</p>
                    @endif
                </div>
            @empty
                <p style="color:var(--muted);">Belum ada data pendidikan.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="experience" style="padding:100px 24px;">
    <div class="container">
        <div class="mono" style="color:var(--amber); font-size:14px; margin-bottom:14px;">pengalaman</div>
        <h2 style="font-size:32px; color:var(--mist); margin-bottom:40px;">Experience</h2>

        <div style="position:relative; padding-left:28px; border-left:1px solid rgba(242,169,59,0.25);">
            @forelse ($experiences as $experience)
                <div style="position:relative; margin-bottom:36px;">
                    <div style="position:absolute; left:-34px; top:4px; width:10px; height:10px; border-radius:50%; background:var(--amber);"></div>
                    <div class="mono" style="color:var(--muted); font-size:13px; margin-bottom:6px;">
                        {{ $experience->start_date ?? '' }} @if($experience->start_date) — @endif {{ $experience->end_date ?? 'Sekarang' }}
                    </div>
                    <h3 style="font-size:20px; color:var(--mist); margin-bottom:4px;">{{ $experience->title }}</h3>
                    <div style="color:var(--muted);">{{ $experience->organization }}</div>
                    @if ($experience->description)
                        <p style="color:var(--muted); margin-top:8px; max-width:600px;">{{ $experience->description }}</p>
                    @endif
                </div>
            @empty
                <p style="color:var(--muted);">Belum ada data pengalaman.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="skills" style="padding:100px 24px; background:var(--surface);">
    <div class="container">
        <div class="mono" style="color:var(--cyan); font-size:14px; margin-bottom:14px;">kemampuan</div>
        <h2 style="font-size:32px; color:var(--mist); margin-bottom:40px;">Skills</h2>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:28px;">
            @forelse ($skills as $category => $items)
                <div>
                    <h3 style="font-size:16px; color:var(--amber); margin-bottom:14px;">{{ $category }}</h3>
                    <div style="display:flex; flex-wrap:wrap; gap:8px;">
                        @foreach ($items as $skill)
                            <span style="background:var(--ink); border:1px solid rgba(10,187,207,0.2); color:var(--mist); padding:6px 14px; border-radius:20px; font-size:13px;">
                                {{ $skill->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @empty
                <p style="color:var(--muted);">Belum ada data skill.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="projects" style="padding:100px 24px;">
    <div class="container">
        <div class="mono" style="color:var(--amber); font-size:14px; margin-bottom:14px;">karya</div>
        <h2 style="font-size:32px; color:var(--mist); margin-bottom:40px;">Projects</h2>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px;">
            @forelse ($projects as $project)
                <div style="background:var(--surface); border-radius:12px; padding:24px; border:1px solid rgba(10,187,207,0.15);">
                    @if ($project->featured)
                        <div class="mono" style="color:var(--amber); font-size:11px; margin-bottom:10px;">FEATURED</div>
                    @endif
                    <h3 style="font-size:19px; color:var(--mist); margin-bottom:10px;">{{ $project->title }}</h3>
                    <p style="color:var(--muted); font-size:14px; margin-bottom:16px;">{{ $project->short_description }}</p>
                    @if ($project->project_url)
                        <a href="{{ $project->project_url }}" target="_blank" style="font-size:13px;">Lihat Project &rarr;</a>
                    @endif
                </div>
            @empty
                <p style="color:var(--muted);">Belum ada project yang dipublikasikan.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="certificates" style="padding:100px 24px; background:var(--surface);">
    <div class="container">
        <div class="mono" style="color:var(--cyan); font-size:14px; margin-bottom:14px;">penghargaan</div>
        <h2 style="font-size:32px; color:var(--mist); margin-bottom:40px;">Certificates</h2>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:20px;">
            @forelse ($certificates as $certificate)
                <div>
                    @if ($certificate->file_path)
                        <img src="{{ asset('storage/' . $certificate->file_path) }}"
                             style="width:100%; border-radius:8px; border:1px solid rgba(10,187,207,0.15);">
                    @endif
                    <div style="font-size:13px; color:var(--muted); margin-top:8px;">{{ $certificate->title }}</div>
                </div>
            @empty
                <p style="color:var(--muted);">Belum ada sertifikat.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="documents" style="padding:100px 24px;">
    <div class="container">
        <div class="mono" style="color:var(--amber); font-size:14px; margin-bottom:14px;">dokumen</div>
        <h2 style="font-size:32px; color:var(--mist); margin-bottom:40px;">Documents</h2>

        <div style="display:flex; gap:20px; flex-wrap:wrap;">
            @forelse ($documents as $document)
                <div style="background:var(--surface); border-radius:12px; padding:24px; min-width:220px; border:1px solid rgba(10,187,207,0.15);">
                    <h3 style="font-size:17px; color:var(--mist); margin-bottom:6px;">{{ $document->title }}</h3>
                    <div class="mono" style="color:var(--muted); font-size:12px; margin-bottom:16px;">
                        {{ $document->type === 'cv' ? 'Bisa didownload' : 'Lihat saja' }}
                    </div>
                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                       style="background:var(--cyan); color:var(--ink); padding:8px 16px; border-radius:6px; font-weight:600; font-size:13px; display:inline-block;">
                        Lihat
                    </a>
                    @if ($document->download_enabled)
                        <a href="{{ asset('storage/' . $document->file_path) }}" download
                           style="border:1px solid var(--cyan); color:var(--cyan); padding:8px 16px; border-radius:6px; font-weight:600; font-size:13px; display:inline-block; margin-left:8px;">
                            Download
                        </a>
                    @endif
                </div>
            @empty
                <p style="color:var(--muted);">Belum ada dokumen.</p>
            @endforelse
        </div>
    </div>
</section>

@if ($spotifyUrl)
<section style="padding:60px 24px; background:var(--surface);">
    <div class="container" style="max-width:700px;">
        <div class="mono" style="color:var(--cyan); font-size:13px; margin-bottom:14px;">sedang saya dengarkan</div>
        <iframe style="border-radius:12px;" src="{{ str_replace('open.spotify.com/', 'open.spotify.com/embed/', $spotifyUrl) }}"
                width="100%" height="152" frameborder="0" allowfullscreen=""
                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
        </iframe>
    </div>
</section>
@endif

<section id="contact" style="padding:100px 24px; text-align:center;">
    <div class="container" style="max-width:600px; margin:0 auto;">
        <div class="mono" style="color:var(--amber); font-size:14px; margin-bottom:14px;">kontak</div>
        <h2 style="font-size:32px; color:var(--mist); margin-bottom:16px;">Mari Terhubung</h2>
        <p style="color:var(--muted); margin-bottom:32px;">
            Terbuka untuk peluang kerja, kolaborasi, atau sekadar ngobrol soal teknologi.
        </p>
        <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
            @forelse ($socialLinks as $link)
                <a href="{{ $link->url }}" target="_blank"
                   style="border:1px solid rgba(10,187,207,0.3); color:var(--mist); padding:10px 20px; border-radius:6px; font-size:14px;">
                    {{ $link->label ?: $link->platform }}
                </a>
            @empty
                <p style="color:var(--muted);">Belum ada kontak.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
