@props([
    'routeName',
    'routeParam',
    'csrfMethod'
])
<form id="create-form" action="{{ route($routeName, ['id' => $routeParam]) }}" method="POST">

    @csrf
    @method($csrfMethod)
    <!-- Form Body -->
    <div>
        <div class="text-sm mb-2 flex items-center">
            <img src="{{ asset('icons/type-program.svg') }}" alt="Icon" width="20" height="20">
            <p class="ml-1">Tipe Program</p>
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
            @yield('formbody2-section2')
        </div>
    </div>

    <!-- Form Body -->
    <div>
        <div class="text-sm mt-6 mb-2  flex items-center">
            <img src="{{ asset('icons/calendar_date_time.svg') }}" alt="Icon" width="20" height="20">
            <p class="ml-1">Tempat & Waktu</p>
        </div>
        <div class="p-6 bg-white rounded-md shadow-sm">
            {{ $formBody3 }}
        </div>
    </div>

    <!-- Form Body -->
    <div>
        <div class="text-sm mt-6 mb-2  flex items-center">
            <img src="{{ asset('icons/partner.svg') }}" alt="Icon" width="20" height="20">
            <p class="ml-1">Mitra / Lembaga</p>
        </div>
        <div class="p-6 bg-white rounded-md shadow-sm">
            {{ $formBody4 }}
        </div>
    </div>

    <!-- Submit Button -->
    <div>
        <div class="text-sm mt-6 mb-2  flex ">
        </div>
        <div class="bg-transparent flex justify-end space-x-4">
            <button type="button"
                class="px-8 py-3 bg-white text-black font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-white dark:hover:bg-gray-200 dark:focus:ring-blue-800"
                onclick="openModal()">
                Save to draft
            </button>

            <button type="submit"
                class="px-8 py-3 bg-blue-600 text-white font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create
            </button>
        </div>
    </div>

    @stack('modal')
    
</form>


<script>


    function numberOnly(id) {
        // Get element by id which passed as parameter within HTML element event
        var element = document.getElementById(id);
        // This removes any other character but numbers as entered by user
        element.value = element.value.replace(/[^0-9]/gi, "");
    }


</script>
