<div class="bg-white dark:bg-transparent flex overflow-hidden mb-6">

    <div class="flex border dark:border-zinc-800 shadow-sm">
        <!-- Tombol Hapus -->
        <button id="delete-selected-button"
            class="flex items-center p-2 dark:border-r-zinc-800 text-black dark:text-white bg-zinc-100 dark:bg-transparent focus:outline-none focus:ring-2 focus:ring-gray-300 disabled:cursor-not-allowed disabled:opacity-50 disabled"
            disabled>
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
            </svg>
            <span class="text-sm mr-1">Hapus</span>

        </button>

        

        @if (Route::currentRouteName() === 'prog-transaksi.index')
            <!-- Tombol Export -->
            <button id="export-selected-button"
                class="flex items-center p-2 text-black dark:text-white bg-white hover:bg-zinc-300 dark:bg-transparent border-l dark:border-l-zinc-800 focus:outline-none disabled:cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 mr-2" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                    <path
                        d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                </svg>
                <span class="text-sm">Export</span>
            </button>
        @endif
    </div>
</div>
