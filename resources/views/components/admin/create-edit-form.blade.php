@props(['routeName'])
<form action="{{ $routeName }}" method="POST">

    <!-- Form Body -->
    <div class="mt-6 text-black dark:text-white">
        {{ $formBody }}
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end">
        <x-button type="submit">
            <!-- Ikon Tambah di Dalam Lingkaran -->
            <div class="flex items-center justify-center w-4 h-4 bg-white rounded-full mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            {{ $nameButton }}
        </x-button>
    </div>
</form>

<script src="{{ asset('js/form/input-uniqueId.js') }}"></script>
