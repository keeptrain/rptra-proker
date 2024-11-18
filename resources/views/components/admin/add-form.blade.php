@props(['routeName'])
<form action="{{ route($routeName) }}" method="POST">

    @csrf
    @method('POST')
    <!-- Form Body -->
    <div class="p-6">
        {{ $formBody }}
    </div>

    <!-- Submit Button -->
    <div class="p-6 flex justify-end">
        <button type="submit"
            class="px-8 py-3 content-end bg-blue-600 text-white font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Tambah
        </button>
    </div>
</form>

<script src="{{ asset('js/form/input-uniqueId.js') }}"></script>
