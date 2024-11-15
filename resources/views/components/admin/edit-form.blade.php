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


<script src="{{ asset('js/form/input-uniqueId.js') }}"></script>
