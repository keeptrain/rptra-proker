<div>
    <x-admin.input-label for="activity-program" class="mb-2">
        Kegiatan
    </x-admin.input-label>

    <!-- Quill Editor Container -->
    <div id="quill-editor" style="height: 150px;"></div>

    <!-- Hidden Textarea untuk menyimpan konten Quill -->
    <textarea id="quill-editor-area" name="activity" rows="5" class="hidden">{{ isset($selectedProgram) ? $selectedProgram->activity : old('activity') }}</textarea>


    <!-- Create toolbar container -->
    <!--div id="toolbar" class="dark:bg-zinc-600">
   
    <select class="ql-size dark:text-black dark:bg-zinc-600">
      <option value="small" class="dark:text-black dark:bg-zinc-700"></option>
      
      <option value="large"></option>
      <option value="huge"></option>
    </select>
 
    <button class="ql-bold"></button>

    <button class="ql-script" value="sub"></button>
    <button class="ql-script" value="super"></button>
  </div-->


</div>

@section('formbody2-section2')
    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
        <!-- Tujuan Program -->
        <div>
            <x-admin.input-label for="tujuan-program" class="mb-2">
                Tujuan
            </x-admin.input-label>

            <x-admin.text-input type="text" id="tujuan-program" name="objective" class=" w-full p-2.5"
                value="{{ isset($selectedProgram) ? $selectedProgram->objective : old('objective') }}"
                placeholder="Masukkan tujuan" />
        </div>

        <!-- Spacer -->
        <div class="flex items-center justify-center pb-2.5 w-6 h-6">

        </div>

        <!-- Output Program -->
        <div>
            <x-admin.input-label for="output-program" class="mb-2">
                Output
            </x-admin.input-label>
            <x-admin.text-input type="text" id="output-program" name="output" class=" w-full p-2.5"
                value="{{ isset($selectedProgram) ? $selectedProgram->output : old('output') }}"
                placeholder="Masukkan output " />
        </div>

        <!-- Output Program -->
        <div>
            <x-admin.input-label for="target-program" class="mb-2">
                Target
            </x-admin.input-label>
            <x-admin.text-input type="text" id="output-program" name="target" class=" w-full p-2.5"
                value="{{ isset($selectedProgram) ? $selectedProgram->target : old('target') }}"
                placeholder="Masukkan output " />
        </div>



        <!-- Spacer -->
        <div class="flex items-center justify-center pb-2.5 w-6 h-6">

        </div>

        <!-- Volume Program -->
        <div>
            <x-admin.input-label for="volume-program" class="mb-2">
                Volume
            </x-admin.input-label>
            <x-admin.text-input type="number" id="input-volume" name="volume" class=" w-full p-2.5"
                value="{{ isset($selectedProgram) ? $selectedProgram->volume : old('volume') }}"
                placeholder="Berapa kali diadakan dalam 1 tahun" />
        </div>

        <!-- Keterangan -->
        <div>
            <x-admin.input-label for="information-program" class="mb-2">
                Keterangan
            </x-admin.input-label>
            <div x-data="{ selected: '{{ isset($selectedProgram) ? $selectedProgram->information : old('information', 'belum_terlaksana') }}' }"
                class="w-full max-w-2xl flex flex-col rounded-lg bg-white dark:bg-zinc-900 shadow p-3">
                <div class="flex flex-row justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="information" value="belum_terlaksana"
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring focus:ring-blue-300 md:ml-4"
                            :checked="selected === 'belum_terlaksana'"
                            @change="selected = 'belum_terlaksana'; resetCheckboxes('belum_terlaksana')">
                        <span class="text-gray-700 dark:text-gray-400 text-xs ml-2">Belum terlaksana</span>
                    </label>

                    <label class="flex items-center">
                        <input type="checkbox" name="information" value="terlaksana"
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring focus:ring-blue-300 md:ml-4"
                            :checked="selected === 'terlaksana'"
                            @change="selected = 'terlaksana'; resetCheckboxes('terlaksana')">
                        <span class="text-gray-700 dark:text-gray-400 text-xs ml-2">Terlaksana</span>
                    </label>


                    <label class="flex items-center">
                        <input type="checkbox" name="information" value="tidak_terlaksana"
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring focus:ring-blue-300 md:ml-4"
                            :checked="selected === 'tidak_terlaksana'"
                            @change="selected = 'tidak_terlaksana'; resetCheckboxes('tidak_terlaksana')">
                        <span class="text-gray-700 dark:text-gray-400 text-xs ml-2">Tidak terlaksana</span>
                    </label>
                </div>
            </div>
            <span
                class="text-gray-400 text-xs mt-2 block">{{ __('* Secara default, keterangan akan terpilih sebagai Belum terlaksana') }}</span>
        </div>
    </div>
@endsection
