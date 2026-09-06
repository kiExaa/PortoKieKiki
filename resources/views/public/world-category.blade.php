@extends('layouts.public')
@section('title', $category->name)

@section('content')
<section style="padding:100px 24px;">
    <div class="container">
        <a href="{{ route('world.index') }}" style="color:var(--muted); font-size:13px;">&larr; Kembali ke My World</a>

        <div class="mono" style="color:var(--amber); font-size:14px; margin:24px 0 14px;">{{ $category->name }}</div>
        <h1 style="font-size:32px; color:var(--mist); margin-bottom:48px;">{{ $category->description ?: $category->name }}</h1>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px;">
            @forelse ($items as $item)
                <div style="background:var(--surface); border-radius:12px; overflow:hidden; border:1px solid rgba(10,187,207,0.15);">
                    @if ($item->preview_image)
                        <img src="{{ asset('storage/' . $item->preview_image) }}" style="width:100%; height:200px; object-fit:cover;">
                    @endif
                    <div style="padding:20px;">
                        <h3 style="font-size:18px; color:var(--mist); margin-bottom:8px;">{{ $item->title }}</h3>
                        <p style="color:var(--muted); font-size:14px; margin-bottom:16px;">{{ $item->description }}</p>
                        <a href="{{ route('world.item', $item) }}"
                           style="background:var(--cyan); color:var(--ink); padding:8px 18px; border-radius:6px; font-weight:600; font-size:13px; display:inline-block;">
                            Explore
                        </a>
                    </div>
                </div>
            @empty
                <p style="color:var(--muted);">Belum ada momen di kategori ini.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
