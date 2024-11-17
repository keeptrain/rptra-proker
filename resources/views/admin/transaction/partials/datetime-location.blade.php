<!-- Lokasi -->
<div>
    <label for="tujuan-program" class="block mb-2 text-sm font-medium text-gray-900">
        Lokasi
    </label>
    <input type="text" id="tujuan-program" name="location"
        value="{{ isset($selectedProgram) ? $selectedProgram->location : old('location') }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
        placeholder="Masukkan tujuan">
</div>

<!-- Spacer -->
<div class="flex items-center justify-center pb-2.5 w-6 h-6">
</div>

 <!-- Jadwal kegiatan -->
<div>

    <label for="nama-program" class="block mb-2 text-sm font-medium text-gray-900">
        Jadwal
    </label>
    <input type="datetime-local" id="nama-program" name="schedule_activity"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 text-sm p-2.5 "
        value="{{ isset($selectedProgram) ? $selectedProgram->schedule_activity : old('schedule_activity') }}"
        placeholder="Masukkan nama program">

</div>
