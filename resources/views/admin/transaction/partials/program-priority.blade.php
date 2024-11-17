<!-- Program Prioritas -->
<label for="nama-program" class="block mb-2 text-sm font-medium text-gray-900">
    Program Prioritas
</label>
<input type="text" id="nama-program" name="priority_program_name"
    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 cursor-not-allowed"
    value="{{ isset($selectedProgram) ? $selectedProgram->priorityPrograms->name ?? '' : old('priority_program_name') }}"
    placeholder="Program prioritas terkait ..." 
    readonly>