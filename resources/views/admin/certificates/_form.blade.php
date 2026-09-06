<label>Judul</label><br>
<input type="text" name="title" value="{{ old('title', $certificate->title ?? '') }}" required><br><br>

<label>Issuer / Penerbit</label><br>
<input type="text" name="issuer" value="{{ old('issuer', $certificate->issuer ?? '') }}"><br><br>

<label>Tanggal Terbit</label><br>
<input type="text" name="issue_date" value="{{ old('issue_date', $certificate->issue_date ?? '') }}" placeholder="Banda Aceh, 9 Mei 2026"><br><br>

<label>Nomor Sertifikat</label><br>
<input type="text" name="certificate_number" value="{{ old('certificate_number', $certificate->certificate_number ?? '') }}"><br><br>

<label>File Sertifikat (gambar)</label><br>
@isset($certificate)
    @if ($certificate->file_path)
        <p><img src="{{ asset('storage/' . $certificate->file_path) }}" width="150"><br>File saat ini — upload baru untuk mengganti</p>
    @endif
@endisset
<input type="file" name="file" accept="image/*"><br><br>

<label>
    <input type="checkbox" name="featured" value="1" {{ old('featured', $certificate->featured ?? false) ? 'checked' : '' }}>
    Featured
</label><br><br>
