<label>Judul / Posisi</label><br>
<input type="text" name="title" value="{{ old('title', $experience->title ?? '') }}" required placeholder="Pramagang - Asisten Lab Komputer"><br><br>

<label>Organisasi</label><br>
<input type="text" name="organization" value="{{ old('organization', $experience->organization ?? '') }}" required placeholder="LP3I College Banda Aceh"><br><br>

<label>Lokasi</label><br>
<input type="text" name="location" value="{{ old('location', $experience->location ?? '') }}" placeholder="Banda Aceh"><br><br>

<label>Tanggal Mulai</label><br>
<input type="text" name="start_date" value="{{ old('start_date', $experience->start_date ?? '') }}" placeholder="2025"><br><br>

<label>Tanggal Selesai</label><br>
<input type="text" name="end_date" value="{{ old('end_date', $experience->end_date ?? '') }}" placeholder="2026 (kosongkan jika masih berjalan)"><br><br>

<label>Deskripsi</label><br>
<textarea name="description" rows="3" style="width:100%">{{ old('description', $experience->description ?? '') }}</textarea><br><br>
