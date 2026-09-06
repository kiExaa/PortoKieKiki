<label>Institusi</label><br>
<input type="text" name="institution" value="{{ old('institution', $education->institution ?? '') }}" required><br><br>

<label>Jurusan</label><br>
<input type="text" name="major" value="{{ old('major', $education->major ?? '') }}"><br><br>

<label>Jenjang (Degree)</label><br>
<input type="text" name="degree" value="{{ old('degree', $education->degree ?? '') }}" placeholder="SMA / D3 / S1"><br><br>

<label>Tahun Mulai</label><br>
<input type="text" name="start_year" value="{{ old('start_year', $education->start_year ?? '') }}" required placeholder="2021"><br><br>

<label>Tahun Selesai</label><br>
<input type="text" name="end_year" value="{{ old('end_year', $education->end_year ?? '') }}" placeholder="2024 (kosongkan jika masih berjalan)"><br><br>

<label>Deskripsi</label><br>
<textarea name="description" rows="3" style="width:100%">{{ old('description', $education->description ?? '') }}</textarea><br><br>
