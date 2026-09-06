<label>Judul</label><br>
<input type="text" name="title" value="{{ old('title', $document->title ?? '') }}" required placeholder="CV Khairul Rizki"><br><br>

<label>Tipe</label><br>
<select name="type">
    @php $selected = old('type', $document->type ?? ''); @endphp
    <option value="cv" {{ $selected == 'cv' ? 'selected' : '' }}>CV (bisa didownload)</option>
    <option value="riwayat_hidup" {{ $selected == 'riwayat_hidup' ? 'selected' : '' }}>Riwayat Hidup (lihat saja, tidak bisa download)</option>
</select><br><br>

<label>File (PDF)</label><br>
@isset($document)
    @if ($document->file_path)
        <p><a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">File saat ini</a> — upload baru untuk mengganti</p>
    @endif
@endisset
<input type="file" name="file" accept="application/pdf"><br><br>
