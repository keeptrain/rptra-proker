<!-- Program Pokok -->
<label for="label-priority-program" class="block mb-2 text-sm font-medium text-gray-900">
    Program Pokok
</label>
<select name="principal_program_id" id="principal_program_id"
    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 ">
    <option value="">-- Pilih Program PKK --</option>
    @foreach ($principalPrograms as $program)
        <option value="{{ $program->id }}" data-priority-name="{{ $program->priorityProgram->name }}"
            {{ (isset($selectedProgram) && $selectedProgram->principal_program_id == $program->id) || old('principal_program_id') == $program->id ? 'selected' : '' }}>
            {{ $program->name }}
        </option>
    @endforeach
</select>