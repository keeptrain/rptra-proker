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
                    <option value="{{ $program->id }}" data-priority-name="{{ $program->priorityProgram->name }}"
                        {{ old('principal_program_id') == $program->id ? 'selected' : '' }}>
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
                value="{{ old('priority_program_name') }}"
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
        <input id="activity-input" name="activity" type="hidden" value="{{ old('activity') }}">
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
                class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                value="{{ old('objective') }}"
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
                class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                value="{{ old('output') }}"
                placeholder="Masukkan output ">
        </div>

        <!-- Output Program -->
        <div>
            <label for="output-program" class="block mb-2 text-sm font-medium text-gray-900">
                Target
            </label>
            <input type="text" id="output-program" name="target"
                class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                value="{{ old('target') }}"
                placeholder="Masukkan output ">
        </div>



        <!-- Spacer -->
        <div class="flex items-center justify-center pb-2.5 w-6 h-6">

        </div>

        <!-- Volume Program -->
        <div>
            <label for="output-program" class="block mb-2 text-sm font-medium text-gray-900">
                Volume
            </label>
            <input type="number" id="input-volume" name="volume"
                class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                value="{{ old('volume') }}"
                placeholder="Berapa kali diadakan dalam 1 tahun">
        </div>

        <!-- Keterangan -->
        <div>
            <label for="output-program" class="block mb-2 text-sm font-medium text-gray-900">
                Keterangan
            </label>
            <div class="w-full max-w-2xl flex flex-col rounded-xl bg-white shadow p-2.5">
                <nav class="flex w-full flex-row justify-between" >
                    <!-- Menggunakan justify-between untuk meratakan input -->
                    <div class="flex items-center flex-1 justify-center">
                        <input type="radio" name="information" value="belum_terlaksana"
                            class="h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-600 checked:border-slate-800" checked />
                        <label class="ml-2 text-slate-600 text-sm">Belum terlaksana</label>
                    </div>
                    <div class="flex items-center flex-1 justify-center">
                        <input type="radio" name="information" value="terlaksana"
                            class="h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-600 checked:border-slate-800" />
                        <label class="ml-2 text-slate-600 text-sm">Terlaksana</label>
                    </div>
                    <div class="flex items-center flex-1 justify-center">
                        <input type="radio" name="information" value="tidak_terlaksana"
                            class="h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-600 checked:border-slate-800" />
                        <label class="ml-2 text-slate-600 text-sm">Tidak terlaksana</label>
                    </div>
                </nav>
            </div>
            <span class="text-gray-400 text-xs mt-2 block">{{ __('* Secara default, keterangan akan terpilih sebagai Belum terlaksana') }}</span>
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
                value="{{ old('location') }}"
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
                value="{{ old('schedule_activity') }}"
                placeholder="Masukkan nama program">
        </div>
    </div>
@endsection

@section('formBody5')
    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
        <!-- Mitra -->
        <div>
            <label for="mitra-select-label" class="block mb-2 text-sm font-medium text-gray-900">
                Mitra
            </label>
            <select id="multiple-select" name="partner[]" multiple
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5">
                @foreach ($institutionalPartners as $mitra)
                    <option value="{{ $mitra->id }}" data-name="{{ $mitra->id }}"
                        {{ in_array($mitra->id, old('partner', [])) ? 'selected' : '' }}>
                        {{ $mitra->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
@endsection
