<label>Kategori</label><br>
<select name="world_category_id">
    @php $selectedCat = old('world_category_id', $item->world_category_id ?? ''); @endphp
    @foreach ($categories as $cat)
        <option value="{{ $cat->id }}" {{ $selectedCat == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
    @endforeach
</select><br><br>

<label>Judul Item</label><br>
<input type="text" name="title" value="{{ old('title', $item->title ?? '') }}" required placeholder="Pulau Banyak"><br><br>

<label>Deskripsi Singkat</label><br>
<textarea name="description" rows="3" style="width:100%">{{ old('description', $item->description ?? '') }}</textarea><br><br>

<label>Foto Preview</label><br>
@isset($item)
    @if ($item->preview_image)
        <p><img src="{{ asset('storage/' . $item->preview_image) }}" width="150"><br>Foto saat ini — upload baru untuk mengganti</p>
    @endif
@endisset
<input type="file" name="preview_image" accept="image/*" {{ isset($item) ? '' : 'required' }}><br><br>
