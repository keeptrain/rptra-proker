<!-- Program Pokok -->

<x-admin.input-label for="label-priority-program" class="mb-2">
    Program Pokok
</x-admin.input-label>
<select name="principal_program_id" id="principal_program_id"
    class="bg-gray-50 dark:bg-zinc-900 border border-gray-300 dark:border-gray-800 text-gray-900 dark:text-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 ">
    <option value="">-- Pilih Program PKK --</option>
    @foreach ($principalPrograms as $program)
        <option value="{{ $program->id }}" data-priority-name="{{ $program->priorityProgram->name }}"
            {{ (isset($selectedProgram) && $selectedProgram->principal_program_id == $program->id) || old('principal_program_id') == $program->id ? 'selected' : '' }}>
            {{ $program->name }}
        </option>
    @endforeach
</select>

