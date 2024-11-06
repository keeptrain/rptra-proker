<!-- Program Prioritas -->
<div class="flex items-center mb-4">
    <label for="priority_program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Program Pokok</label>
    <select name="priority_program" id="priority_program"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
        <option>-- Pilih Program PKK --</option>
        <option value="">TEST</option>
        <option value="">TEST</option>
        <option value="">TEST</option>
    </select>
</div>

<!-- Nama Program -->
<div class="flex items-center mb-4">
    <label for="nama-program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Program Prioritas</label>
    <input type="text" id="nama-program" name="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-not-allowed"
        placeholder="Program prioritas terkait ..." required readonly>
</div>

<!-- Kegiatan -->
<div class="mb-4">
    <label for="kegiatan" class="block text-sm font-medium text-gray-900 mb-2">Kegiatan</label>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <div id="editor-container" style="height: 150px; border: 1px solid #d1d5db; border-radius: 0.5rem;"></div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });
    </script>
</div>

<!-- Tujuan Program -->
<div class="flex items-center mb-4">
    <label for="nama-program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Tujuan</label>
    <input type="text" id="nama-program" name="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Masukkan nama program" required>
</div>

<!-- Output Program -->
<div class="flex items-center mb-4">
    <label for="nama-program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Output</label>
    <input type="text" id="nama-program" name="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Masukkan nama program" required>
</div>

<!-- Sasaran Program -->
<div class="flex items-center mb-4">
    <label for="nama-program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Volume</label>
    <input type="text" id="nama-program" name="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Masukkan nama program" required>
</div>

<!-- Sasaran Program -->
<div class="flex items-center mb-4">
    <label for="nama-program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Lokasi</label>
    <input type="text" id="nama-program" name="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Masukkan nama program" required>
</div>

<!-- Jadwal Kegiatan -->
<div class="flex items-center mb-4">
    <label for="nama-program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Jadwal kegiatan</label>
    <input type="datetime-local" id="nama-program" name="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Masukkan nama program" required>
</div>

<!-- Program Prioritas -->
<div class="flex items-center mb-4">
    <label for="priority_program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Mitra Lembaga</label>
    <select name="priority_program" id="priority_program"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
        <option>-- Pilih Program PKK --</option>
        <option value="">TEST</option>
        <option value="">TEST</option>
        <option value="">TEST</option>
    </select>
</div>

<!-- Program Prioritas -->
<div class="flex items-center mb-4">
   
    <label for="priority_program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Keterangan</label>
    <div class="relative w-full max-w-2xl flex flex-col rounded-xl bg-white shadow">
        <nav class="flex w-full flex-row gap-1 p-2">
          <!-- Checkbox 1 -->
          <div role="button" class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100">
            <label for="check-vertical-list-group4" class="flex w-full cursor-pointer items-center px-3 py-2">
              <div class="inline-flex items-center w-full">
                <input type="checkbox" class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800" id="check-vertical-list-group4" />
                <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </span>
                <label class="cursor-pointer ml-2 text-slate-600 text-sm" for="check-vertical-list-group4">Belum Terlaksana</label>
              </div>
            </label>
          </div>
      
          <!-- Checkbox 2 -->
          <div role="button" class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100">
            <label for="check-vertical-list-group5" class="flex w-full cursor-pointer items-center px-3 py-2">
              <div class="inline-flex items-center w-full">
                <input type="checkbox" class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800" id="check-vertical-list-group5" />
                <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </span>
                <label class="cursor-pointer ml-2 text-slate-600 text-sm" for="check-vertical-list-group5">Terlaksana</label>
              </div>
            </label>
          </div>
      
          <!-- Checkbox 3 -->
          <div role="button" class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100">
            <label for="check-vertical-list-group6" class="flex w-full cursor-pointer items-center px-3 py-2">
              <div class="inline-flex items-center w-full">
                <input type="checkbox" class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800" id="check-vertical-list-group6" />
                <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a 1 1 0 01-1.414 0l-4-4a 1 1 0 011.414-1.414L8 12.586l7.293-7.293a 1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </span>
                <label class="cursor-pointer ml-2 text-slate-600 text-sm" for="check-vertical-list-group6">Tidak Terlaksana</label>
              </div>
            </label>
          </div>
        </nav>
      </div>
      

</div>


