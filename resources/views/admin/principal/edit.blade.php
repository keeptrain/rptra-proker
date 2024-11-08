<!-- Nama Program -->
<div class="flex items-center mb-4">
    <label for="nama-program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Nama Program</label>
    <input type="text" id="nama-program" name="name"
        class="flex-1 bg-gray-50 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block text-sm p-2.5 dark:bg-gray-50 {{ $errors->has('name') ? 'dark:border-red-500' : 'dark:border-gray-300' }} dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Masukkan nama program" value="{{ $selectedProgram->name }}">

</div>

<!-- Prefix ID -->
<div class="flex items-center mb-4">
    <label for="prefix-id" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Program ID</label>
    <div class="flex flex-1 gap-2">
        <input type="text" id="prefix-id" name="prefix"
            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block text-sm p-2.5 dark:bg-gray-50 {{ $errors->has('id') ? 'border-red-500' : 'border-gray-300' }} dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukkan prefix ID, misal: PPRIO" value="{{ $prefix }}" required>
        <input type="text" id="number" name="number"
            class="w-1/4 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block text-sm p-2.5 dark:bg-gray-50 {{ $errors->has('id') ? 'border-red-500' : 'border-gray-300' }} dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Nomor" oninput="numberOnly(this.id);" maxlength="3" value="{{ $number }}"required>
    </div>
</div>

<!-- Program ID -->
<div class="flex items-start mb-4">
    <label for="nama-id" class="w-1/4 text-sm font-medium text-gray-900 mr-2 pt-2">Program ID Menjadi</label>
    <div class="flex-1">
        <input type="text" id="nama-id" name="id"
            class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block text-sm p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:text-gray-400"
            placeholder="Program ID akan terbentuk ..." value="{{ $selectedProgram->id }}" readonly>
        <span class="text-gray-600 text-xs mt-1 block">{{ __('* Tidak bisa di edit, hanya sebagai contoh') }}</span>
    </div>
</div>

<!-- Program Prioritas -->
<div class="flex items-center mb-4">
    <label for="priority_program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Program Prioritas</label>
    <select name="priority_program" id="priority_program"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
        <option value="">-- Pilih Program Prioritas --</option>
        @foreach ($priorityPrograms as $program)
            <option value="{{ $program->id }}"
                {{ $selectedProgram->priority_program_id == $program->id ? 'selected' : '' }}>
                {{ $program->name }}
            </option>
        @endforeach
    </select>
</div>
