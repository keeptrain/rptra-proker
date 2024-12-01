<x-app-layout>
    @section('main-content')
    <div class="bg-white dark:bg-zinc-900 text-black dark:text-neutral-100 rounded-md border-2 border-slate-100 dark:border-zinc-900 overflow-auto">
        <div class="grid grid-cols-4 divide-x divide-gray-200 dark:divide-gray-700">
            <!-- Program Kerja -->
            <div class="p-4 flex flex-col items-center space-y-2">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Program Kerja</h2>
                <p class="text-gray-600 dark:text-gray-400">Isi program kerja di sini.</p>
            </div>
            
            <!-- Prioritas -->
            <div class="p-4 flex flex-col items-center space-y-2">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Prioritas</h2>
                <p class="text-gray-600 dark:text-gray-400">Isi prioritas di sini.</p>
            </div>
            
            <!-- Pokok -->
            <div class="p-4 flex flex-col items-center space-y-2">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Pokok</h2>
                <p class="text-gray-600 dark:text-gray-400">Isi pokok di sini.</p>
            </div>
            
            <!-- Mitra -->
            <div class="p-4 flex flex-col items-center space-y-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                    <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                    <path d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
                </svg>
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Mitra</h2>
                <p class="text-gray-600 dark:text-gray-400">Mitra</p>
            </div>

        </div>
    </div>



    
    
    
    @endsection

    
</x-app-layout>    