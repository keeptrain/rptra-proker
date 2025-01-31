<!-- Button to toggle sidebar -->
<button @click="sidebarOpen = !sidebarOpen"
    :class="{ 'text-zinc-500 dark:text-gray-400': !sidebarOpen, 'text-gray-500 dark:text-gray-400': sidebarOpen }">
    <svg viewBox="0 0 20 20" class="w-7 h-7 fill-current mr-2">
        <path x-show="!sidebarOpen" fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
        <path x-show="sidebarOpen" fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
    </svg>
</button>

<!-- Searchbar>
<form class="w-1/5">
    <div
        class="hidden rounded-md border border-gray-200 dark:border-zinc-600 overflow-hidden font-[sans-serif] lg:flex">
        <input type="email" placeholder="Cari sesuatu..."
            class="w-full outline-none bg-white dark:bg-zinc-900 text-gray-400 text-sm px-2 py-0.5" />
        <button type='button' class="flex items-center justify-center bg-blue-700 px-2"> <svg
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="14px" class="fill-white">
                <path
                    d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                </path>
            </svg>
        </button>
    </div>
</form-->

<div x-data="{
    darkMode: $persist(localStorage.getItem('theme') === 'dark'),
    isFullscreen: false,
    openProfile: false
}" class="justify-end flex flex-1">
    <!-- Button to toggle dark/light mode -->
    <button
        @click="darkMode = !darkMode; 
                    document.body.classList.toggle('dark', darkMode);
                    localStorage.setItem('theme', darkMode ? 'dark' : 'light');"
        type="button"
        class="mr-4 text-gray-500 bg-white dark:bg-zinc-900 border-b border-gray-200 dark:border-zinc-800 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-3"
        aria-checked="false">
        <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
        </svg>
        <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                fill-rule="evenodd" clip-rule="evenodd"></path>
        </svg>
    </button>

    <button
        @click="isFullscreen = !isFullscreen; 
            if (isFullscreen) { 
                document.documentElement.requestFullscreen(); 
            } else { 
                document.exitFullscreen(); 
            }"
        type="button"
        class="mr-4 text-gray-500 bg-white dark:bg-zinc-900 border-b border-gray-200 dark:border-zinc-800 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-3">
        <svg x-show="!isFullscreen" class="w-5 h-5 text-gray-800 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" class="bi bi-arrows-fullscreen" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707m4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707m0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707" />
        </svg>

        <svg x-show="isFullscreen" class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 4h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5" />
        </svg>
    </button>

    {{-- <button @click="openProfile = !openProfile" class="rounded-full border-2 border-gray-200 dark:border-zinc-800 "
        id="user-menu-button">

        <img class="size-10 p-1 rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="Bordered avatar">

        <!-- Dropdown -->
        <div x-cloak x-show="openProfile" @click.away="openProfile = false"
            class="absolute right-6 z-10 mt-2 w-40 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none">
            <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                id="user-menu-item-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                id="user-menu-item-2">Sign out</a>
        </div>
    </button> --}}
</div>
