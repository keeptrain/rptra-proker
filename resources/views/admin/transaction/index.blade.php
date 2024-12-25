<x-app-layout>
    @section('main-content')
        <div
            class="bg-white dark:bg-zinc-900 text-black dark:text-neutral-100 rounded-md border-2 border-slate-100 dark:border-zinc-900 overflow-auto">
            <div class="border-b dark:border-zinc-700 pl-6 pr-6 pt-4 pb-4">
                <div class="flex justify-between items-center ">
                    <x-admin.input-label>
                        @if (isset($transactions))
                            {{ __('DATA PROGRAM KERJA ') }}
                        @elseif (isset($draft))
                            {{ __('DRAFT PROGRAM KERJA ') }}
                        @endif
                    </x-admin.input-label>
                    <div class="flex justify-between items-center">
                        <div x-data="{ openFilters: false }" class="relative dark:border-zinc-800">
                            <button @click="openFilters = ! openFilters"
                                class="flex items-center p-1 mr-2 border dark:border-zinc-800 rounded-md" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-filter w-5 h-5 mr-1" viewBox="0 0 16 16">
                                    <path
                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                                </svg>
                                <span>
                                    Filters
                                </span>
                            </button>

                            <!-- Dropdown -->
                            <div x-cloak x-show="openFilters" @click.away="openFilters = false"
                                class="w-full absolute  z-10 left-0 bg-white border border-gray-200 dark:bg-zinc-800 dark:border-zinc-800 shadow rounded-md">
                                <div class="px-2 py-1 cursor-pointer hover:bg-sky-100 dark:hover:bg-sky-900"
                                    onclick="window.location.href='{{ route('prog-transaksi.index', ['filter' => 'completed']) }}'">
                                    Data</div>
                                <div class="px-2 py-1 cursor-pointer hover:bg-sky-100"
                                    onclick="window.location.href='{{ route('prog-transaksi.index', ['filter' => 'draft']) }}'">
                                    Draft
                                </div>
                            </div>
                        </div>

                        <x-button onclick="window.location.href='{{ route('prog-transaksi.create') }}'" color="blue"
                            class="px-2 py-1 dark:hover:bg-blue-800 ">
                            <!-- Ikon Tambah di Dalam Lingkaran -->
                            <svg class="w-5 h-5 mr-1 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Tambah
                        </x-button>
                    </div>
                </div>
            </div>
            <div class="p-6">
                @if (isset($transactions))
                    @include('admin.transaction.show-completed')
                @elseif (isset($draft))
                    @include('admin.transaction.show-draft')
                @else
                    <p>Tidak ada transaksi yang ditemukan.</p>
                @endif
            </div>
        </div>
    @endsection
</x-app-layout>
