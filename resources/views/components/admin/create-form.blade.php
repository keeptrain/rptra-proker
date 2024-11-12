@props(['routeName'])
<form action="{{ route($routeName) }}" method="POST">

    @csrf
    @method('POST')
    <!-- Form Body -->
    <div>
        <div class="text-sm mb-2 flex items-center">
            <svg class="w-5 h-5 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <p>Tipe Program</p>
        </div>
        <div class="p-6 bg-white rounded-md shadow-sm">
            {{ $formBody1 }}
        </div>
    </div>

    <!-- Form Body -->

    <div class="">
        <div class="text-sm mt-6 mb-2 flex items-center">
            <svg width="20" height="20" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title />
                <g id="Layer_2">
                    <g id="Layer_3">
                        <path d="M5.4,5.4v69.1h69.1V5.4H5.4z M71.6,71.6H8.4V8.4h63.1V71.6z" />
                        <rect height="9.7" width="9.7" x="16.6" y="16.6" />
                        <rect height="3" width="29.8" x="33.6" y="20" />
                        <rect height="3" width="46.8" x="16.6" y="34.1" />
                        <rect height="3" width="46.8" x="16.6" y="44.7" />
                        <rect height="8.2" width="46.7" x="16.6" y="55.2" />
                    </g>
                </g>
            </svg>
            <p class="ml-1">Informasi kegiatan</p>
        </div>
        <div class="p-6 bg-white rounded-t-md border-b">
            {{ $formBody2 }}
        </div>
        <div class="p-6 bg-gray-50 rounded-b-md shadow-sm">
            {{ $formBody3 }}
        </div>
    </div>

    <!-- Form Body -->
    <div>
        <div class="text-sm mt-6 mb-2  flex items-center">
            <img src="{{ asset('icons/calendar_date_time.svg') }}" alt="Icon" width="20" height="20">
            <p class="ml-1">Tempat & Waktu</p>
        </div>
        <div class="p-6 bg-white rounded-md shadow-sm">
            {{ $formBody4 }}
        </div>
    </div>

    <!-- Form Body -->
    <div>
        <div class="text-sm mt-6 mb-2  flex items-center">
            <img src="{{ asset('icons/partner.svg') }}" alt="Icon" width="20" height="20">
            <p class="ml-1">Mitra / Lembaga</p>
        </div>
        <div class="p-6 bg-white rounded-md shadow-sm">
            {{ $formBody5 }}
        </div>
    </div>

    <!-- Submit Button -->

</form>

<script>
    // Script to auto-fill the Unik ID field based on prefix and number input
    document.getElementById('prefix-id').addEventListener('input', updateUnikId);
    document.getElementById('number').addEventListener('input', updateUnikId);

    function updateUnikId() {
        const prefix = document.getElementById('prefix-id').value;
        const number = document.getElementById('number').value.padStart(3, '0'); // format number to 3 digits
        document.getElementById('nama-id').value = `${prefix}-${number}`;
    }

    function numberOnly(id) {
        // Get element by id which passed as parameter within HTML element event
        var element = document.getElementById(id);
        // This removes any other character but numbers as entered by user
        element.value = element.value.replace(/[^0-9]/gi, "");
    }
</script>
