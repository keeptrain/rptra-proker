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

    <!-- Cropperjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>

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
    <div x-data="{ sidebarOpen: $persist(true) }"
        class="bg-gray-50 dark:bg-zinc-800 text-black dark:text-neutral-100 flex h-svh max-h-svh">

        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed md:static inset-y-0 left-0 z-40 border-r dark:border-zinc-700 transition-transform transform "
            :class="{ '-translate-x-full hidden': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            <div class="flex flex-col items-stretch bg-white dark:bg-zinc-900 justify-between h-full w-56">
                <!-- Sidebar content -->
                @include('layouts.sidebar')
            </div>
        </div>

        <!-- Overlay (Active only on mobile) -->
        <div class="fixed inset-0 bg-black bg-opacity-50 z-30 transition-opacity md:hidden"
            :class="{ 'opacity-100': sidebarOpen, 'opacity-0 pointer-events-none': !sidebarOpen }"
            @click="sidebarOpen = false">
        </div>

        <!-- Content Area -->
        <div class="flex-1 overflow-auto transition-all duration-300"
            :class="{ 'ml-0': sidebarOpen && window.innerWidth >= 768, 'ml-0': !sidebarOpen || window.innerWidth < 768 }">
            <div class="flex h-full flex-col justify-between overflow-y">

                <!-- Header -->
                <div id="main-header" class=" top-0 xl:ml-16 xl:mr-16">
                    <div class="flex  p-6 py-6">
                        @include('layouts.header')
                    </div>
                </div>

                <!-- Main content -->
                <div class="p-6 flex flex-1 flex-col xl:ml-16 xl:mr-16">

                    <!-- Breadcrumb -->
                    {{-- <div class="breadcrumb">
                        <div class="mb-4">
                            @yield('breadcrumb')
                        </div>
                    </div> --}}

                    <div>
                        @yield('main-content')
                    </div>
                </div>

                <!-- Footer-->
                <div class="hidden w-full lg:block">
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
