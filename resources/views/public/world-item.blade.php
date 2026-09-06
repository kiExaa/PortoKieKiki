@extends('layouts.public')
@section('title', $item->title)

@section('content')
<section style="padding:100px 24px;">
    <div class="container">
        <a href="{{ route('world.category', $item->category) }}" style="color:var(--muted); font-size:13px;">&larr; Kembali ke {{ $item->category->name }}</a>

        <h1 style="font-size:32px; color:var(--mist); margin:24px 0 12px;">{{ $item->title }}</h1>
        <p style="color:var(--muted); max-width:600px; margin-bottom:48px;">{{ $item->description }}</p>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px;">
            @forelse ($item->images as $image)
                <div>
                    <img src="{{ asset('storage/' . $image->image_path) }}" style="width:100%; border-radius:8px;">
                    @if ($image->caption)
                        <div style="color:var(--muted); font-size:13px; margin-top:6px;">{{ $image->caption }}</div>
                    @endif
                </div>
            @empty
                <p style="color:var(--muted);">Belum ada foto di item ini.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
