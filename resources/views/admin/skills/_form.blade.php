<label>Nama Skill</label><br>
<input type="text" name="name" value="{{ old('name', $skill->name ?? '') }}" required placeholder="Laravel"><br><br>

<label>Kategori</label><br>
<select name="category">
    @php
        $categories = ['Web Development', 'Database', 'UI/UX', 'Networking & IT Support', 'Professional Skills'];
        $selected = old('category', $skill->category ?? '');
    @endphp
    @foreach ($categories as $cat)
        <option value="{{ $cat }}" {{ $selected == $cat ? 'selected' : '' }}>{{ $cat }}</option>
    @endforeach
</select><br><br>

<label>Deskripsi (opsional)</label><br>
<textarea name="description" rows="2" style="width:100%">{{ old('description', $skill->description ?? '') }}</textarea><br><br>
