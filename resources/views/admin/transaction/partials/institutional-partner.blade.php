<!-- Mitra -->
<label for="mitra-select-label" class="block mb-2 text-sm font-medium text-gray-900">
    Mitra
</label>
<select id="multiple-select" name="partner[]" multiple
    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5">
    @foreach ($institutionalPartners as $mitra)
        <option value="{{ $mitra->id }}" data-name="{{ $mitra->id }}"
            {{ (old('partner') && in_array($mitra->id, old('partner'))) || ($selectedProgram ?? '' && $selectedProgram->institutionalPartners->contains($mitra->id)) ? 'selected' : '' }}>
  
            {{ $mitra->name }}
        </option>
    @endforeach
</select>
