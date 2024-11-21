<!-- Lokasi -->
<div>
    <x-admin.input-label for="location" class="mb-2">
        Lokasi
    </x-admin.input-label>
    <x-admin.text-input type="text" id="tujuan-program" name="location"
        value="{{ isset($selectedProgram) ? $selectedProgram->location : old('location') }}"
        class=" w-full p-2.5"
        placeholder="Masukkan tempat lokasi dilaksanakan"/>
</div>

<!-- Spacer -->
<div class="flex items-center justify-center pb-2.5 w-6 h-6">
</div>

 <!-- Jadwal kegiatan -->
<div>

    <x-admin.input-label for="datetime" class="mb-2">
        Jadwal kegiatan
    </x-admin.input-label>
    <x-admin.text-input type="datetime-local" id="nama-program" name="schedule_activity"
        class=" w-3/4 p-2.5 text-white"
        value="{{ isset($selectedProgram) ? $selectedProgram->schedule_activity : old('schedule_activity') }}"
        />

</div>
