@props([
    'routeName',
    'routeParam',
    'routeBack'
])

<form action="{{ route($routeName, ['id' => $routeParam]) }}" method="POST" >
   
        @csrf
        @method('PUT')
        <!-- Form Body -->
        <div class="p-6" >
            {{ $formBody }}
        </div>
        
        <!-- Submit Button -->
        <div class="p-6 ">
            <button type="button" onclick="window.location.href='{{ route($routeBack) }}'"
            class="px-8 py-3 bg-gray-600 text-white font-medium text-sm rounded-lg">
            Kembali
        </button>
            <button type="submit"
                class="px-8 py-3 bg-blue-600 text-white font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Perbarui
            </button>
        </div>
  
  
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
