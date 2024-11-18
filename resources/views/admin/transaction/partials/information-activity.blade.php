<div>
    <label for="kegiatan" class="block text-sm font-medium text-gray-900 mb-2">Kegiatan</label>

    <!-- Quill Editor Container -->
    <div id="quill-editor" style="height: 150px;"></div>

    <!-- Hidden Textarea untuk menyimpan konten Quill -->
    <textarea id="quill-editor-area" name="activity" rows="5" class="hidden">{{ isset($selectedProgram) ? $selectedProgram->activity : old('activity') }}</textarea>
</div>

@section('formbody2-section2')
    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
        <!-- Tujuan Program -->
        <div>
            <label for="tujuan-program" class="block mb-2 text-sm font-medium text-gray-900">
                Tujuan
            </label>
            <input type="text" id="tujuan-program" name="objective"
                class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                value="{{ isset($selectedProgram) ? $selectedProgram->objective : old('objective') }}"
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
                value="{{ isset($selectedProgram) ? $selectedProgram->output : old('output') }}"
                placeholder="Masukkan output ">
        </div>
    
        <!-- Output Program -->
        <div>
            <label for="output-program" class="block mb-2 text-sm font-medium text-gray-900">
                Target
            </label>
            <input type="text" id="output-program" name="target"
                class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                value="{{ isset($selectedProgram) ? $selectedProgram->target : old('target') }}"
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
                value="{{ isset($selectedProgram) ? $selectedProgram->volume : old('volume') }}"
                placeholder="Berapa kali diadakan dalam 1 tahun">
        </div>
    
       <!-- Keterangan -->
        <div>
            <label for="output-program" class="block mb-2 text-sm font-medium text-gray-900">
                Keterangan
            </label>
            <div class="w-full max-w-2xl flex flex-col rounded-xl bg-white shadow p-2.5">
                <nav class="flex w-full flex-row justify-between">
                    <div class="flex items-center flex-1 justify-center">
                        <input type="radio" name="information" value="belum_terlaksana"
                            class="h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-600 checked:border-slate-800"
                            {{ (old('information', isset($selectedProgram) ? $selectedProgram->information : '') == 'belum_terlaksana') ? 'checked' : '' }} checked/>
                        <label class="ml-2 text-slate-600 text-sm">Belum terlaksana</label>
                    </div>
                    <div class="flex items-center flex-1 justify-center">
                        <input type="radio" name="information" value="terlaksana"
                            class="h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-600 checked:border-slate-800"
                            {{ (old('information', isset($selectedProgram) ? $selectedProgram->information : '') == 'terlaksana') ? 'checked' : '' }} />
                        <label class="ml-2 text-slate-600 text-sm">Terlaksana</label>
                    </div>
                    <div class="flex items-center flex-1 justify-center">
                        <input type="radio" name="information" value="tidak_terlaksana"
                            class="h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-600 checked:border-slate-800"
                            {{ (old('information', isset($selectedProgram) ? $selectedProgram->information : '') == 'tidak_terlaksana') ? 'checked' : '' }} />
                        <label class="ml-2 text-slate-600 text-sm">Tidak terlaksana</label>
                    </div>
                </nav>
            </div>
            <span class="text-gray-400 text-xs mt-2 block">{{ __('* Secara default, keterangan akan terpilih sebagai Belum terlaksana') }}</span>
        </div>
    </div>
    @endsection


