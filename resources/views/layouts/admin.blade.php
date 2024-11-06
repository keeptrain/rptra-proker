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


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <div class="bg-white text-white">
            <x-admin.sidebar />
        </div>

        <!-- Alert for success message -->
       <div>
        @yield('alert')
       </div>


        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Page Heading -->
            <header class="bg-gray-100 shadow mb-4">
                <div class="p-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <!-- Conditional heading based on route -->
                        @if (Route::currentRouteName() === 'prog-prioritas.index')
                            {{ __('Program Prioritas') }}
                        @elseif (Route::currentRouteName() === 'prog-prioritas.show')
                            {{ __('Program Prioritas') }}
                        @elseif (Route::currentRouteName() === 'prog-prioritas.store')
                            {{ __('Tambah Program Prioritas') }}
                        @elseif (Route::currentRouteName() === 'progpokok.show')
                            {{ __('Daftar Program Pokok') }}
                        @endif
                    </h2>
                </div>
            </header>
            <!-- Page Content -->
            <div class="flex space-x-6">
                <!-- Table Section -->
                <div class="w-3/4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b">
                        <h2 class="font-semibold text-lg text-gray-800">
                            @yield('content-table-header')
                        </h2>
                    </div>
                    <div class="p-6 bg-white border-gray-200">
                        @yield('content-table')
                    </div>
                </div>

                <!-- Form Section -->
                
                <div class="w-2/4 bg-transparent overflow-y-hidden sm:rounded-lg">
                    <div class="px-6 py-4 border-b bg-white flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-gray-800">
                            @yield('content-form-header')
                        </h2>
                        <!-- Hide/Unhide Button -->
                        <button onclick="toggleForm()" class="p-1 focus:outline-none">
                            <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" /> <!-- Arrow Down -->
                            </svg>
                        </button>
                    </div>

                    <div id="formSection" class="bg-white border-gray-200 overflow-hidden">
                        @yield('content-form')
                    </div>
                </div>
                
                
            </div>
        </main>
    </div>

    <script type="text/javascript" src="{{ asset('build/assets/js/formSection.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>






</html>
