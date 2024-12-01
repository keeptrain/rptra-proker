<x-app-layout>


    @section('main-content')
        <div
            class="bg-white dark:bg-zinc-900 text-black dark:text-neutral-100 rounded-md border-2 border-slate-100 dark:border-zinc-900 overflow-auto">
            <div class="border-b pl-6 pr-6 pt-4 pb-4">

                <div class="flex justify-between items-center ">
                    <x-admin.input-label>
                        {{ __('LIST PROGRAM PRIORITAS ') }}
                    </x-admin.input-label>

                    <div>
                        <x-button id="delete-selected-button" type="button" color="red" class="hidden">
                            <!-- Ikon Sampah di Dalam Lingkaran -->
                            <svg class="w-5 h-5 mr-1 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                            </svg>
                            Hapus
                        </x-button>

                        <x-button onclick="window.location.href='{{ route('prog-prioritas.create') }}'" color="blue"
                            class="px-2 py-1 dark:hover:bg-blue-800 ">
                            <!-- Ikon Tambah di Dalam Lingkaran -->
                            <svg class="w-5 h-5 mr-1 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Tambah Program
                        </x-button>
                    </div>
                </div>

            </div>
            <div class="p-6">
                @include('admin.priority.show')
            </div>


        </div>
    @endsection


</x-app-layout>
