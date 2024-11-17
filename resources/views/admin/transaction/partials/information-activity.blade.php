<label for="kegiatan" class="block text-sm font-medium text-gray-900 mb-2">Kegiatan</label>

<!-- Quill Editor Container -->
<div id="quill-editor" style="height: 150px;"></div>

<!-- Hidden Textarea untuk menyimpan konten Quill -->
<textarea id="quill-editor-area" name="activity" rows="5" class="hidden">{{ isset($selectedProgram) ? $selectedProgram->activity : old('activity') }}
</textarea>
