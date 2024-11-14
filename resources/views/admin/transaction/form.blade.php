@section('formBody1')
    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
        <!-- Program Pokok -->
        <div>
            <label for="label-priority-program" class="block mb-2 text-sm font-medium text-gray-900">
                Program Pokok
            </label>
            <select name="principal_program_id" id="principal_program_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 ">
                <option value="">-- Pilih Program PKK --</option>
                @foreach ($principalPrograms as $program)
                    <option value="{{ $program->id }}" data-priority-name="{{ $program->priorityProgram->name }}">
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Panah -->
        <div class="flex items-center justify-center pb-2.5">
            <svg class="feather feather-arrow-right" fill="none" height="24" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                xmlns="http://www.w3.org/2000/svg">
                <line x1="5" x2="19" y1="12" y2="12" />
                <polyline points="12 5 19 12 12 19" />
            </svg>
        </div>

        <!-- Program Prioritas -->
        <div>
            <label for="nama-program" class="block mb-2 text-sm font-medium text-gray-900">
                Program Prioritas
            </label>
            <input type="text" id="nama-program" name="priority_program_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 cursor-not-allowed"
                placeholder="Program prioritas terkait ..." readonly>
        </div>
    </div>
@endsection


<!-- Kegiatan -->
@section('formBody2')
    <div class="mb-4">
        <label for="kegiatan" class="block text-sm font-medium text-gray-900 mb-2">Kegiatan</label>
        <div id="editor-container" style="height: 150px; border: 1px solid #d1d5db; border-radius: 0.5rem;"></div>

        <!-- Hidden input untuk menyimpan konten Quill -->
        <input id="activity-input" name="activity" type="hidden">
    </div>
@endsection


@section('formBody3')
    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
        <!-- Tujuan Program -->
        <div>
            <label for="tujuan-program" class="block mb-2 text-sm font-medium text-gray-900">
                Tujuan
            </label>
            <input type="text" id="tujuan-program" name="objective"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                placeholder="Masukkan tujuan">
        </div>

        <!-- Spacer -->
        <div class="flex items-center justify-center pb-2.5 w-6 h-6">

        </div>

        <!-- Output Program -->
        <div>
            <label for="output-program" class="block mb-2 text-sm font-medium text-gray-900">
                Output
            </label>
            <input type="text" id="output-program" name="output"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                placeholder="Masukkan output ">
        </div>



        <!-- Volume Program -->
        <div>
            <label for="output-program" class="block mb-2 text-sm font-medium text-gray-900">
                Volume
            </label>
            <input type="number" id="output-program" name="volume"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                placeholder="Berapa kali diadakan dalam 1 tahun">
        </div>

        <!-- Spacer -->
        <div class="flex items-center justify-center pb-2.5 w-6 h-6">

        </div>

        <!-- Keterangan -->
        <div>
            <label for="output-program" class="block mb-2 text-sm font-medium text-gray-900">
                Keterangan
            </label>
            <div class="relative w-full max-w-2xl flex flex-col rounded-xl bg-white shadow p-2.5">
                <nav class="flex w-full flex-col gap-1">
                    <!-- Radio Button 1: Belum Terlaksana -->
                    @foreach ($transactions as $item)
                    <div class="flex items-center">
                        <input type="radio" name="information[]" value="{{ $item }}"
                            class="h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                             />
                        <label class="ml-2 text-slate-600 text-sm">{{ $item }}</label>
                    </div>
                    @endforeach
                    
        
                
                </nav>
            </div>
        </div>

        <!-- Output Program -->
        <div>
            <label for="output-program" class="block mb-2 text-sm font-medium text-gray-900">
                Target
            </label>
            <input type="text" id="output-program" name="target"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                placeholder="Masukkan output ">
        </div>
    </div>
@endsection

@section('formBody4')
    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
        <!-- Tujuan Program -->
        <div>
            <label for="tujuan-program" class="block mb-2 text-sm font-medium text-gray-900">
                Lokasi
            </label>
            <input type="text" id="tujuan-program" name="location"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                placeholder="Masukkan tujuan">
        </div>

        <!-- Spacer -->
        <div class="flex items-center justify-center pb-2.5 w-6 h-6">

        </div>

        <!-- Program Prioritas -->
        <div>
            <label for="nama-program" class="block mb-2 text-sm font-medium text-gray-900">
                Jadwal
            </label>
            <input type="datetime-local" id="nama-program" name="schedule_activity"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 "
                placeholder="Masukkan nama program">
        </div>
    </div>
@endsection

@section('formBody5')
    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
        <!-- Mitra -->
        <div >
            <label for="mitra-select-label" class="block mb-2 text-sm font-medium text-gray-900">
                Mitra
            </label>
            <select id="multiple-select" name="partner[]"
                multiple
                >
                @foreach ($institutionalPartners as $mitra)
                    <option value="{{ $mitra->id }}" data-name="{{ $mitra->id }}">
                        {{ $mitra->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <script >
         const choices = new Choices('#multiple-select', {
    removeItemButton: true, // Menampilkan tombol untuk menghapus item
    searchEnabled: true, // Mengaktifkan pencarian
    placeholder: true, // Mengaktifkan placeholder
    placeholderValue: 'Select multiple options...', // Teks placeholder
});
    </script>

@endsection





<!-- Keterangan -->
<div class="flex items-center mb-4">

    <label for="priority_program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Keterangan</label>
    <div class="relative w-full max-w-2xl flex flex-col rounded-xl bg-white shadow">
        <nav class="flex w-full flex-row gap-1 p-2">
            <!-- Checkbox 1 -->
            <div role="button"
                class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100">
                <label for="check-vertical-list-group4" class="flex w-full cursor-pointer items-center px-3 py-2">
                    <div class="inline-flex items-center w-full">
                        <input type="checkbox"
                            class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                            id="check-vertical-list-group4" />
                        <span
                            class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                fill="currentColor" stroke="currentColor" stroke-width="1">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <label class="cursor-pointer ml-2 text-slate-600 text-sm"
                            for="check-vertical-list-group4">Belum Terlaksana</label>
                    </div>
                </label>
            </div>

            <!-- Checkbox 2 -->
            <div role="button"
                class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100">
                <label for="check-vertical-list-group5" class="flex w-full cursor-pointer items-center px-3 py-2">
                    <div class="inline-flex items-center w-full">
                        <input type="checkbox"
                            class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                            id="check-vertical-list-group5" />
                        <span
                            class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                fill="currentColor" stroke="currentColor" stroke-width="1">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <label class="cursor-pointer ml-2 text-slate-600 text-sm"
                            for="check-vertical-list-group5">Terlaksana</label>
                    </div>
                </label>
            </div>

            <!-- Checkbox 3 -->
            <div role="button"
                class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100">
                <label for="check-vertical-list-group6" class="flex w-full cursor-pointer items-center px-3 py-2">
                    <div class="inline-flex items-center w-full">
                        <input type="checkbox"
                            class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                            id="check-vertical-list-group6" />
                        <span
                            class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                fill="currentColor" stroke="currentColor" stroke-width="1">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a 1 1 0 01-1.414 0l-4-4a 1 1 0 011.414-1.414L8 12.586l7.293-7.293a 1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <label class="cursor-pointer ml-2 text-slate-600 text-sm"
                            for="check-vertical-list-group6">Tidak Terlaksana</label>
                    </div>
                </label>
            </div>
        </nav>
    </div>


</div>
