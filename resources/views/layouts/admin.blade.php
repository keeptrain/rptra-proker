<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Perencanaan Program ') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- SweetAlert CSS and JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Quilljs -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
        

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.tailwindcss.css">
    
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

        <x-admin.alert/>

        <div class="flex min-h-screen bg-gray-100 ">
            <!-- Sidebar -->

           
                @include('layouts.sidebar')
           

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <!-- Page Heading -->
                <header class="bg-gray-100 shadow mb-4">
                    <div class="p-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            @yield('page-heading')
                        </h2>
                    </div>
                </header>
                <!-- Page Content -->
                <div class="flex flex-col md:flex-row space-x-0 md:space-x-6">
                    @if (Route::currentRouteName() === 'prog-prioritas.index' ||
                            Route::currentRouteName() === 'prog-pokok.index' ||
                            Route::currentRouteName() === 'prog-mitra.index' ||
                            Route::currentRouteName() === 'prog-transaksi.index')
                        <!-- Table Section -->
                        <div class="md:w-4/5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="px-6 py-4 border-b">
                                <h2 class="font-semibold text-lg text-gray-800">
                                    @yield('content-table-header')
                                </h2>
                            </div>
                            <div class="p-6 bg-white dark:bg-slate-900 border-gray-200">
                                @yield('content-table')
                            </div>
                        </div>

                        <!-- Form Section -->
                        <div class="md:w-1/2 bg-transparent overflow-y-hidden sm:rounded-lg mt-4 md:mt-0">
                            <div class="px-6 py-4 border-b bg-white flex justify-between items-center">
                                <h2 class="font-semibold text-lg text-gray-800">
                                    @yield('content-form-header')
                                </h2>
                                <!-- Hide/Unhide Button -->
                                <button onclick="toggleForm()" class="p-1 focus:outline-none">
                                    <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" /> <!-- Arrow Down -->
                                    </svg>
                                </button>
                            </div>

                            <div id="formSection" class="bg-white border-gray-200 overflow-hidden">
                                @yield('content-form')
                            </div>
                        </div>
                    @elseif (Route::currentRouteName() === 'prog-prioritas.edit' ||
                            Route::currentRouteName() === 'prog-pokok.edit' ||
                            Route::currentRouteName() === 'prog-mitra.edit')
                        @if (isset($selectedProgram))
                            <div class="w-full md:w-2/4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="px-6 py-4 border-b">
                                    <h2 class="font-semibold text-lg text-gray-800">
                                        @yield('content-form-header')
                                    </h2>
                                </div>
                                <div class="p-6 bg-white border-gray-200">
                                    @yield('content-form-edit')
                                </div>
                            </div>
                        @endif
                    @elseif (Route::currentRouteName() === 'prog-transaksi.create' || 'prog-transaksi.edit')
                        <div class="w-full md:w-3/4 bg-transparent overflow-hidden ">
                            <div class="px-6 py-4 border-b bg-white rounded-md">
                                <h2 class="font-semibold text-lg bg-w text-gray-800">
                                    @yield('content-form-header')
                                </h2>
                            </div>
                            <div class="p-6 bg-transparent border-gray-200">
                                @yield('content-form-transaction')
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>
        <script src="{{ asset('js/layouts/sidebar.js') }}"></script>
        

        <!--script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script-->
    </body>

</html>
