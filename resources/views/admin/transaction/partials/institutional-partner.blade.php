<!-- Mitra -->
<x-admin.input-label for="mitra-program" class="mb-2">
    Mitra
</x-admin.input-label>

<!-- Konten Choices.js di sini-->

<select id="multiple-select" name="partner[]" multiple>
    @foreach ($institutionalPartners as $mitra)
        <option value="{{ $mitra->id }}" data-name="{{ $mitra->id }}"
            {{ (old('partner') && in_array($mitra->id, old('partner'))) || (isset($selectedProgram) && $selectedProgram->institutionalPartners->contains($mitra->id)) ? 'selected' : '' }}>
            {{ $mitra->name }}
        </option>
    @endforeach
</select>


<script>
    const choices = new Choices('#multiple-select', {
        removeItemButton: true, // Menampilkan tombol untuk menghapus item
        searchEnabled: true, // Mengaktifkan pencarian
        placeholder: true, // Mengaktifkan placeholder
        placeholderValue: 'Select multiple options...',
    });

    /*var partners = @json(
        $institutionalPartners->map(function ($partner) {
            return [
                'value' => $partner->id,
                'label' => $partner->name,
            ];
        }));
    

    function tagTemplates(partners) {
        return `
        <div class="">
            ${partners.label}
        </div>
    `; 
    }

    function suggestionItemTemplate(partners) {
        return `
        <div class="tagify__dropdown__item" tabindex="0" data-value="${partners.value}">
            ${partners.label}
        </div>
    `;
    }

    var input = document.querySelector('input[name=partner]');
    var tagify = new Tagify(input, {
       
        dropdown: {
            enabled: 0,
            classname: 'partners-list',
        },
        whitelist: partners,
        enforceWhitelist: true,
        templates: {
           tag
           dropdownItem: suggestionItemTemplate,
        }
    });*/
</script>
