<div class="flex flex-col items-stretch justify-between h-full border-x  dark:border-zinc-700">
    <div class="flex flex-col flex-shrink-0 w-full">
        <div class="flex items-center justify-center p-6 mt-1 text-center">
            <a href="#" class="text-lg leading-normal text-gray-600 dark:text-gray-300 focus:outline-none focus:ring">
                RPTRA</a>
        </div>
        <nav>
            <div class="flex-grow md:block md:overflow-y-auto overflow-x-hidden"
                :class="{ 'opacity-1': sidebarOpen, 'opacity-0': !sidebarOpen }">
                <a class="flex justify-start items-center px-4 py-3 hover:bg-zinc-200 dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white"
                    href="{{ route('dashboard.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                        role="img" class="w-5 h-5 fill-current" preserveAspectRatio="xMidYMid meet"
                        viewBox="0 0 1200 1200">
                        <path
                            d="M600 195.373c-331.371 0-600 268.629-600 600c0 73.594 13.256 144.104 37.5 209.253h164.062C168.665 942.111 150 870.923 150 795.373c0-248.528 201.471-450 450-450s450 201.472 450 450c0 75.55-18.665 146.738-51.562 209.253H1162.5c24.244-65.148 37.5-135.659 37.5-209.253c0-331.371-268.629-600-600-600zm0 235.62c-41.421 0-75 33.579-75 75c0 41.422 33.579 75 75 75s75-33.578 75-75c0-41.421-33.579-75-75-75zm-224.927 73.462c-41.421 0-75 33.579-75 75c0 41.422 33.579 75 75 75s75-33.578 75-75c0-41.421-33.579-75-75-75zm449.854 0c-41.422 0-75 33.579-75 75c0 41.422 33.578 75 75 75c41.421 0 75-33.578 75-75c0-41.421-33.579-75-75-75zM600 651.672l-58.813 294.141v58.814h117.627v-58.814L600 651.672z"
                            fill="currentColor"></path>
                    </svg>
                    <span class="mx-4">Dashboard</span>
                </a>

                <a class="flex items-center px-4 py-3 hover:bg-zinc-200 dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white {{ request()->is('program-kerja/prioritas*') ? 'bg-gray-200 dark:bg-blue-900 dark:text-white' : '' }}"
                    href="{{ route('prog-prioritas.index') }}">
                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                        viewBox="0 0 24 24">
                        <path
                            d="M9,10h1a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm0,2a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,13.05,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-3-3H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <span class="mx-4 ">Prioritas</span>

                </a>

                <a class="flex items-center px-4 py-3 hover:bg-zinc-200 dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white {{ request()->is('program-kerja/pokok*') ? 'bg-gray-200 dark:bg-blue-900 dark:text-white' : '' }}"
                    href="{{ route('prog-pokok.index') }}">
                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                        viewBox="0 0 24 24">
                        <path
                            d="M9,10h1a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm0,2a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,13.05,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-3-3H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <span class="mx-4">Pokok</span>

                </a>
                
                <a class="flex items-center px-4 py-3 hover:bg-zinc-200 dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white  {{ request()->is('program-kerja/mitra*') ? 'bg-gray-200 dark dark:bg-blue-900 dark:text-white' : '' }}"
                    href="{{ route('prog-mitra.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                        <path d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
                      </svg>
                    <span class="mx-4">Mitra</span>

                </a>

                <div x-data="{ open: false }">
                    <a @click="open = !open" class="flex items-center px-4 py-3 hover:bg-zinc-200 dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5"/>
                        </svg>
                        <span class="flex-grow mx-4">Transaksi</span>
                        <svg :class="{'rotate-180': open}" class="w-4 h-4 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                
                    <!-- Dropdown Menu -->
                    <div x-show="open" class="pl-3">
                        <a href="{{ route('prog-transaksi.index') }}" class="flex items-center px-4 py-2 text-sm  hover:bg-zinc-200 dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white">
                            <span class="flex-grow mx-4">- Data</span>
                        </a>
                        <a href="{{ route('prog-transaksi.show.draft') }}" class="flex items-center  px-4 py-2 text-sm  hover:bg-zinc-200 dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white">
                            <span class="flex-grow mx-4">- Draft</span>
                        </a>
                      
                    </div>
                </div>
                 

            </div>

        </nav>

    </div>

</div>
