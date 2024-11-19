<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Perencanaan Program ') }}</title>
        <style>
            @media (max-width: 768px) {
                .search-input {
                    display: none;
                    /* Sembunyikan input pada layar kecil */
                }

                .search-icon {
                    display: block;
                    /* Tampilkan ikon pada layar kecil */
                }
            }

            @media (min-width: 768px) {
                .search-icon {
                    display: none;
                    /* Sembunyikan ikon pada layar besar */
                }
            }
        </style>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- SweetAlert CSS and JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Quilljs -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">


        <!-- Datatables -->


        <!-- Fomantic UI CSS -->
        <!--link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.semanticui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.semanticui.css"-->


        <!-- Choicesjs -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiase">

        <!-- Main container -->
        <div class="w-full flex h-svh max-h-svh">

            <!-- Sidebar -->
            <div id="sidebar"
                class=" h-full top-0 left-0 text-white dark:text-zinc-200 bg-white dark:bg-zinc-900 w-60">
                <div class="h-full place-content-start border-r-2 border-slate-100 dark:border-zinc-950 overflow-auto">
                    <div class="text-center py-6 border-b border-slate-100 dark:border-gray-600">
                        RPTRA
                    </div>
                    <div class="p-4">
                        @include('layouts.sidebar-new')
                    </div>
                </div>
            </div>

            <div class="h-full flex-1 bg-gray-50 dark:bg-zinc-800 overflow-auto ">
                <!-- Main Content Area -->
                <div class="flex h-full flex-col justify-between overflow-y ">
                    <div id="main-header" class="sticky top-0 xl:ml-20 xl:mr-20">
                        <!-- Header -->
                        <div class="flex items-center  bg-gray-50 dark:bg-zinc-800 p-6 py-6 border-b">
                            @include('layouts.header')
                        </div>
                    </div>

                    <div class="p-6 flex flex-1 flex-col xl:ml-20 xl:mr-20">
                        <!-- Page header (Breadcrumb) -->
                        <div class="bg-gray-50 dark:bg-zinc-800 text-black dark:text-neutral-100 mb-4">
                            @include('components.breadcrumb')
                        </div>

                        <!-- Content -->
                        <div
                            class="bg-white dark:bg-zinc-900 text-black  dark:text-neutral-100 rounded-md border-2 border-slate-100 dark:border-zinc-900 p-4 overflow-auto">
                            <div class="w-full">
                                <h1 class="text-sm font-semibold text-zinc-300">
                                    <div class="flex justify-between items-center ">
                                        @yield('name-content')
                                    </div>
                                   
                                </h1>
                            </div>

                            {{ $mainTable }}


                        </div>




                    </div>

                    <div class="w-full">
                        <!-- Footer -->
                        <div class="bg-white dark:bg-zinc-900 py-2">
                            <h1 class="text-black dark:text-white text-center text-xl">Footer</h1>
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
        document.addEventListener('DOMContentLoaded', function() {
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


            // Ganti kembali ke ikon menu
        });
    </script>

</html>
