<!-- Nama Program -->
<div class="flex items-center mb-4">
    <label for="nama-program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Nama Program</label>
    <input type="text" id="nama-program" name="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Masukkan nama program" required>
</div>

<!-- Program Prioritas -->
<div class="flex items-center mb-4">
    <label for="priority_program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Program Prioritas</label>
    <select name="priority_program" id="priority_program"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
        <option>-- Pilih Program Prioritas --</option>
        @foreach ($priorityPrograms as $program)
            <option value="{{ $program->id }}">{{ $program->name }}</option>
        @endforeach
    </select>
</div>

<!-- Prefix ID -->
<div class="flex items-center mb-4">
    <label for="prefix-id" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Prefix ID</label>
    <div class="flex w-3/4">
        <input type="text" id="prefix-id" name="prefix"
            class="bg-gray-500 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukkan prefix ID, misal: PPRIO" required>
        <input type="text" id="number" name="number"
            class="ml-4 rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-20 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Nomor" oninput="numberOnly(this.id);" maxlength="3" required />
    </div>
</div>

<div class="flex items-center mb-4">
    <label for="nama-id" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Program ID</label>
    <div class="flex w-3/4">
        <input type="text" id="nama-id" name="id"
            class="bg-gray-700 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block flex-1 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Program ID akan terbentuk ..." readonly>
    </div>
</div>
