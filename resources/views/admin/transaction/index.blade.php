

<x-app-layout>
    @section('name-content')
        {{ __('LIST PROGRAM KERJA ') }}

        <div> 
            <x-button id="delete-selected-button" type="button" color="red" class="hidden">
                <!-- Ikon Sampah di Dalam Lingkaran -->
                <svg class="w-5 h-5 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                  </svg>
                  
                
                Hapus</x-button>

            <x-button onclick="window.location.href='{{ route('prog-transaksi.create') }}'" color="blue" class=" dark:hover:bg-blue-800 ">
                <!-- Ikon Tambah di Dalam Lingkaran -->
                <svg class="w-5 h-5 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  
                Tambah Program
            </x-button>
        </div>
    @endsection



    <x-slot name="main">
        @include('admin.transaction.show-completed')
    </x-slot>

</x-app-layout>

