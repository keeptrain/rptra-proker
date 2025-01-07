<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

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

    <!-- Chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href=" https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

    <!-- Choicesjs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css">
    <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>


    <!-- Tagify -->
    <!--script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" /-->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-cloak x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode === true }" class="antialiased">

    <x-admin.alert />

    <!-- Main container -->
    <div x-data="{ sidebarOpen: $persist(true) }" class="w-full flex h-svh max-h-svh">
        <!-- Sidebar Lama-->
        <div id="sidebar">
            <div :class="{ 'w-56': sidebarOpen, 'w-0': !sidebarOpen }"
                class="bg-white dark:bg-zinc-900 top-0 bottom-0 left-0 z-30 block w-56 h-full min-h-screen overflow-y-auto overflow-x-hidden text-gray-500 transition-all duration-300 ease-in-out">
                @include('layouts.sidebar')
            </div>
        </div>

        <div class="h-full flex-1 bg-gray-50 dark:bg-zinc-800 overflow-auto">
            <!-- Main Content Area -->
            <div class="flex h-full flex-col justify-between overflow-y ">
                <div id="main-header" class="sticky top-0 xl:ml-32 xl:mr-32 z-10">
                    <!-- Header -->
                    <div class="flex bg-gray-50 dark:bg-zinc-800 p-6 py-6">
                        <!-- Header -->
                        @include('layouts.header')
                    </div>
                </div>

                <div class="p-6 flex flex-1 flex-col xl:ml-32 xl:mr-32">
                    <!-- Page header (Breadcrumb) -->
                    <div class="breadcrumb">
                        <div class="bg-gray-50 dark:bg-zinc-800 text-black dark:text-neutral-100 mb-4">
                            @yield('breadcrumb')
                        </div>
                    </div>
                    <div>
                        @yield('main-content')
                    </div>

                </div>

                <div class="hidden w-full lg:block">
                    <!-- Footer -->
                    <div class="bg-white dark:bg-zinc-900 py-2">
                        <h1 class="text-black dark:text-white text-center text-sm">Kelompok Rencana Program Kerja 2025
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
