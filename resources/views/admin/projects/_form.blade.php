<label>Judul</label><br>
<input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required><br><br>

<label>Tipe</label><br>
<input type="text" name="type" value="{{ old('type', $project->type ?? '') }}" placeholder="web / uiux"><br><br>

<label>Short Description</label><br>
<textarea name="short_description" rows="2" style="width:100%">{{ old('short_description', $project->short_description ?? '') }}</textarea><br><br>

<label>Description</label><br>
<textarea name="description" rows="3" style="width:100%">{{ old('description', $project->description ?? '') }}</textarea><br><br>

<label>Problem</label><br>
<textarea name="problem" rows="2" style="width:100%">{{ old('problem', $project->problem ?? '') }}</textarea><br><br>

<label>Solution</label><br>
<textarea name="solution" rows="2" style="width:100%">{{ old('solution', $project->solution ?? '') }}</textarea><br><br>

<label>Features</label><br>
<textarea name="features" rows="2" style="width:100%">{{ old('features', $project->features ?? '') }}</textarea><br><br>

<label>My Role</label><br>
<input type="text" name="role" value="{{ old('role', $project->role ?? '') }}"><br><br>

<label>Project URL</label><br>
<input type="url" name="project_url" value="{{ old('project_url', $project->project_url ?? '') }}"><br><br>

<label>GitHub URL</label><br>
<input type="url" name="github_url" value="{{ old('github_url', $project->github_url ?? '') }}"><br><br>

<label>Status</label><br>
<select name="status">
    <option value="draft" {{ old('status', $project->status ?? 'draft') == 'draft' ? 'selected' : '' }}>Draft (belum tampil publik)</option>
    <option value="published" {{ old('status', $project->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
</select><br><br>

<label>
    <input type="checkbox" name="featured" value="1" {{ old('featured', $project->featured ?? false) ? 'checked' : '' }}>
    Featured Project
</label><br><br>
