<label>Platform</label><br>
<select name="platform">
    @php $selected = old('platform', $socialLink->platform ?? ''); @endphp
    @foreach (['Email', 'GitHub', 'Instagram', 'TikTok'] as $p)
        <option value="{{ $p }}" {{ $selected == $p ? 'selected' : '' }}>{{ $p }}</option>
    @endforeach
</select><br><br>

<label>Label (opsional, teks yang ditampilkan)</label><br>
<input type="text" name="label" value="{{ old('label', $socialLink->label ?? '') }}"><br><br>

<label>URL</label><br>
<input type="text" name="url" value="{{ old('url', $socialLink->url ?? '') }}" required placeholder="https://github.com/kiExaa atau mailto:email@gmail.com"><br><br>
