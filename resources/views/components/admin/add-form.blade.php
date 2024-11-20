@props(['routeName'])
<form action="{{ route($routeName) }}" method="POST">

    <!-- Form Body -->
    <div class="mt-6 text-black dark:text-white">
        {{ $formBody }}
    </div>

    <!-- Submit Button -->
    <div class=" flex justify-end">
        <x-button type="submit"  >Tambah</x-button>
    </div>
</form>

<script src="{{ asset('js/form/input-uniqueId.js') }}"></script>
