@extends('layouts.public')
@section('title', 'My World')

@section('content')
<section style="padding:100px 24px;">
    <div class="container">
        <div class="mono" style="color:var(--amber); font-size:14px; margin-bottom:14px;">personal world</div>
        <h1 style="font-size:38px; color:var(--mist); margin-bottom:12px;">Enter My World</h1>
        <p style="color:var(--muted); max-width:500px; margin-bottom:48px;">
            Sisi lain dari saya — di luar kode dan project, ini dunia yang saya jalani sehari-hari.
        </p>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:20px;">
            @foreach ($categories as $category)
                <a href="{{ route('world.category', $category) }}"
                   style="display:block; background:var(--surface); border-radius:12px; padding:28px; border:1px solid rgba(10,187,207,0.15);">
                    <h3 style="font-size:20px; color:var(--mist); margin-bottom:8px;">{{ $category->name }}</h3>
                    <div class="mono" style="color:var(--muted); font-size:12px;">{{ $category->items_count }} momen</div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
