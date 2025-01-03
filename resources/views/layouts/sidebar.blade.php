<div class="flex flex-col items-stretch justify-between h-full border-x dark:border-zinc-700">
    <div class="flex flex-col flex-shrink-0 w-full">
        <div class="flex items-center justify-center p-6 mt-1 text-center">
            <a href="{{ route('dashboard.index') }}"
                class="text-lg font-bold leading-normal text-gray-600 dark:text-gray-300 focus:outline-none focus:ring">
                RPTRA Cibubur</a>
        </div>
        <nav>
            <div class="flex-grow m-1.5 md:block md:overflow-y-auto overflow-x-hidden"
                :class="{ 'opacity-1': sidebarOpen, 'opacity-0': !sidebarOpen }">
                <a class="flex justify-start items-center px-4 py-3 hover:bg-zinc-100 rounded-xl hover:rounded-xl dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white  {{ request()->is('/*') ? 'bg-white dark:bg-blue-900 dark:text-white rounded-xl' : '' }}"
                    href="{{ route('dashboard.index') }}">
                    
                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                        <path d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z"/>
                      </svg>
                    <span class="mx-4">Dashboard</span>
                </a>

                <a class="flex items-center px-4 py-3 hover:bg-zinc-100 rounded-xl hover:rounded-xl dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white {{ request()->is('program-kerja/prioritas*') ? 'bg-gray-200 dark:bg-blue-900 dark:text-white rounded-xl' : '' }}"
                    href="{{ route('prog-prioritas.index') }}">
                   
                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                        <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
                      </svg>
                    <span class="mx-4 ">Prioritas</span>

                </a>

                <a class="flex items-center px-4 py-3 hover:bg-zinc-100 rounded-xl hover:rounded-xl dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white {{ request()->is('program-kerja/pokok*') ? 'bg-gray-200 dark:bg-blue-900 dark:text-white rounded-xl' : '' }}"
                    href="{{ route('prog-pokok.index') }}">
                    
                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                        <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z"/>
                      </svg>
                    <span class="mx-4">Pokok</span>

                </a>

                <a class="flex items-center px-4 py-3  hover:bg-zinc-100 rounded-xl hover:rounded-xl dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white {{ request()->is('program-kerja/mitra*') ? 'bg-gray-200 dark dark:bg-blue-900 dark:text-white rounded-xl' : '' }}"
                    href="{{ route('prog-mitra.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                        <path
                            d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z" />
                        <path
                            d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z" />
                    </svg>
                    <span class="mx-4">Mitra</span>
                </a>

                <div>
                    <a class="flex items-center px-4 py-3 hover:bg-zinc-100 rounded-xl hover:rounded-xl dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white {{ request()->is('program-kerja/transaksi*') ? 'bg-gray-200 dark:bg-blue-900 dark:text-white rounded-xl ' : '' }} cursor-default"
                        href="{{ route('prog-transaksi.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5" />
                        </svg>
                        <span class="flex-grow mx-4">Program kerja</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Settings Section -->

    </div>
    <div class="mt-auto m-1.5">
        {{-- <a class="flex justify-start items-center px-4 py-3 mb-4 hover:bg-zinc-100 rounded-xl dark:hover:bg-zinc-700 focus:bg-gray-200 hover:text-black dark:hover:text-white {{ request()->is('settings/profile*') ? 'bg-gray-200 dark:bg-blue-900 dark:text-white rounded-xl ' : '' }}"
            href="{{ route('dashboard.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear"
                viewBox="0 0 16 16">
                <path
                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                <path
                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
            </svg>
            <span class="mx-4">Pengaturan</span>
        </a> --}}
        <div class="bg-sky-100 dark:bg-zinc-800 rounded-xl mb-4 shadow-sm">
            <a href="{{ route('profile.index') }}"
                class="flex items-center w-full hover:bg-sky-100 dark:hover:bg-zinc-700 rounded-xl p-2">
                <!-- Avatar -->
                <img class="w-10 h-10 rounded-full mr-4"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="User Avatar">

                <!-- Name -->
                <span class="flex-grow text-gray-700 dark:text-gray-300 text-sm font-medium">{{ Auth::user()->name }} </span>

                <!-- Arrow Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right text-gray-500" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                </svg>
            </a>
        </div>
    </div>
</div>
