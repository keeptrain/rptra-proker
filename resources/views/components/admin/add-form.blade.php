@props(['route' => 'prog-prioritas.store', 'alternativeRoute' => 'prog-pokok.store', 'alternativeRoute1' => 'prog-mitra.store'])
<form action="{{ route($route) }}" method="POST" class="max-w-lg">

    @csrf
    {{ $formBody }}


    <!-- Submit Button -->
    <button  onclick="window.location.href='{{ url()->previous() }}';" type="submit"
        class="mt-4 px-4 py-2 bg-gray-500 text-white font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-grey-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Kembali
    </button>
    <button type="submit"
        class="mt-4 px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Tambah
    </button>
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
