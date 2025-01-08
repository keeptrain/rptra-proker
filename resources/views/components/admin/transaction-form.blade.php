@props(['routeName', 'csrfMethod'])

<form id="create-form" action="{{ $routeName }}" method="POST">

    <!-- Form Body -->
    <div>
        <div class="text-sm mb-2 flex items-center text-black dark:text-zinc-400">
            {{-- <img src="{{ asset('icons/type-program.svg') }}" class="fill-current" alt="Icon" width="20"
                height="20"> --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                  </svg>
            <p class="ml-1">Tipe Program</p>
        </div>
        <div class="p-6 bg-white dark:bg-zinc-900 rounded-md shadow-sm">
            {{ $formBody1 }}
        </div>
    </div>

    <!-- Form Body -->
    <div>
        <div class="text-sm mt-6 mb-2 flex items-center text-black dark:text-zinc-400">
            <svg width="20" height="20" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;"
                class="fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
        <div class="p-6 bg-white dark:bg-zinc-900 rounded-t-md border-b dark:border-b-zinc-900">
            {{ $formBody2 }}
        </div>
        <div class="p-6 bg-gray-50 dark:bg-zinc-900  rounded-b-md shadow-sm">
            @yield('formbody2-section2')
        </div>
    </div>

    <!-- Form Body -->
    <div>
        <div class="text-sm mt-6 mb-2 flex items-center text-black dark:text-zinc-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-calendar-event" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
            </svg>
            <p class="ml-1">Tempat & Waktu</p>
        </div>
        <div class="p-6 bg-white dark:bg-zinc-900 rounded-md shadow-sm">
            {{ $formBody3 }}
        </div>
    </div>

    <!-- Form Body -->
    <div>
        <div class="text-sm mt-6 mb-2 flex items-center text-black dark:text-zinc-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-building" viewBox="0 0 16 16">
                <path
                    d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                <path
                    d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
            </svg>
            <p class="ml-1 ">Mitra / Lembaga</p>
        </div>
        <div class="p-6 bg-white dark:bg-zinc-900 rounded-md shadow-sm">
            {{ $formBody4 }}
        </div>
    </div>

    <!-- Submit Button -->
    <div>
        <div class="text-sm mt-6 mb-2 flex">
        </div>
        <div class="bg-transparent flex justify-end space-x-4">
            @yield('button-content')
        </div>
    </div>

    @stack('modal')

</form>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    function numberOnly(id) {
        // Get element by id which passed as parameter within HTML element event
        var element = document.getElementById(id);
        // This removes any other character but numbers as entered by user
        element.value = element.value.replace(/[^0-9]/gi, "");
    }
</script>
