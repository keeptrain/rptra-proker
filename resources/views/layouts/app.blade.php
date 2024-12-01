<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perencanaan Program ') }}</title>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.14.3/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- SweetAlert CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Quilljs -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">


    <!-- Datatables -->
    <link rel="stylesheet" href=" https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

    <!-- Fomantic UI CSS -->
    <!--link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.semanticui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.semanticui.css"-->

    <!-- Choicesjs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    
    
    <!--script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" /-->
   

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-cloak x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode === true }" class="antialiased">

    <x-admin.alert />

    <!-- Main container -->
    <div class="w-full flex h-svh max-h-svh">



        <!-- Sidebar -->
        <div x-cloak x-data="sidebar()" id="sidebar" class="relative items-start ">
            <div class=" fixed top-0 z-40 transition-all duration-300 p-6 mt-1">
                <button x-on:click="sidebarOpen = !sidebarOpen"
                    :class="{ 'hover:bg-gray-300 dark:hover:bg-zinc-600': !sidebarOpen, 'hover:bg-gray-300': sidebarOpen }"
                    class="transition-all duration-300 rounded-full focus:outline-none">
                    <svg viewBox="0 0 20 20" class="w-7 h-7 fill-current"
                        :class="{ 'text-zinc-500 dark:text-gray-400': !sidebarOpen, 'text-gray-500 dark:text-gray-400': sidebarOpen }">
                        <path x-show="!sidebarOpen" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="sidebarOpen" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div x-cloak wire:ignore :class="{ 'w-56': sidebarOpen, 'w-0': !sidebarOpen }"
                class="top-0 bottom-0 left-0 z-30 block w-56 h-full min-h-screen overflow-y-auto text-gray-500 transition-all duration-300 ease-in-out bg-white dark:bg-zinc-900  overflow-x-hidden">
                <!--div
                        class="text-center text-black dark:text-white py-6 border-b border-slate-100 dark:border-gray-600">
                        RPTRA
                    </div-->
                @include('layouts.sidebar')

            </div>
        </div>













        <div class="h-full flex-1 bg-gray-50 dark:bg-zinc-800 overflow-auto  ">
            <!-- Main Content Area -->
            <div class="flex h-full flex-col justify-between overflow-y ">
                <div id="main-header" class="sticky top-0 xl:ml-32 xl:mr-32 z-10">
                    <!-- Header -->
                    <div class="flex items-center  bg-gray-50 dark:bg-zinc-800 p-6 py-6">
                        <!-- Header -->

                        @include('layouts.header')
                    </div>
                </div>

                <div class="p-6 flex flex-1 flex-col xl:ml-32 xl:mr-32  ">

                    <!-- Page header (Breadcrumb) -->
                    <div class="breadcrumb">
                        <div class="bg-gray-50 dark:bg-zinc-800 text-black dark:text-neutral-100 mb-4">
                            @yield('breadcrumb')
                        </div>
                    </div>

                    @yield('main-content')

                    
                    

                </div>

                
                


                <div class="hidden w-full lg:block ">
                    <!-- Footer -->
                    <div class="bg-white dark:bg-zinc-900 py-2 ">
                        <h1 class="text-black dark:text-white text-center text-sm">Kelompok Rencana Program Kerja 2024
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <!--div class="hidden h-full flex-[0.1] bg-gray-50 lg:block">
                <-- Right Sidebar >
            </div-->
    </div>



</body>
<script>
    function sidebar() {
        return {
            sidebarOpen: true,
            sidebarProductMenuOpen: false,
            openSidebar() {
                this.sidebarOpen = true
            },
            closeSidebar() {
                this.sidebarOpen = false
            },
            sidebarProductMenu() {
                if (this.sidebarProductMenuOpen === true) {
                    this.sidebarProductMenuOpen = false
                    window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                } else {
                    this.sidebarProductMenuOpen = true
                    window.localStorage.setItem('sidebarProductMenuOpen', 'open');
                }
            },
            checkSidebarProductMenu() {
                if (window.localStorage.getItem('sidebarProductMenuOpen')) {
                    if (window.localStorage.getItem('sidebarProductMenuOpen') === 'open') {
                        this.sidebarProductMenuOpen = true
                    } else {
                        this.sidebarProductMenuOpen = false
                        window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                    }
                }
            },
        }
    }

   
    
    /*document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleButton.addEventListener('click', function(event) {
            // Toggle 'hidden' class for small screens

            sidebar.classList.toggle('hidden')
            if (sidebar.classList.contains('hidden')) {
                toggleButton.innerHTML = `
            <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                <path d="M 7 4 L 23 20" />
                <path d="M 7 20 L 23 4" />
            </svg>
            `;
            } else {
                toggleButton.innerHTML = `
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
            `;
            }

            // Mencegah event bubbling
        });

        const toggleButtons = document.getElementById('toggleSearch');
        const searchInput = document.querySelector('.search-input');
        const searchIcon = document.querySelector('.search-icon');

        toggleButtons.addEventListener('click', function() {
            searchInput.classList.toggle('hidden');
            searchIcon.classList.toggle('hidden');
        });



    });*/
</script>


</html>
