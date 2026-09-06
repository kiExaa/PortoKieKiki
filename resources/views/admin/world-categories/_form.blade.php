<label>Nama Kategori</label><br>
<input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" required><br><br>

<label>Deskripsi</label><br>
<textarea name="description" rows="2" style="width:100%">{{ old('description', $category->description ?? '') }}</textarea><br><br>
