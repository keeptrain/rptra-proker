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
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <div class="bg-white text-white">
            <x-admin.sidebar/>
        </div>
    
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    
                    <!-- Heading or Title Section -->
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        @if (Route::currentRouteName() === 'proker.index')
                        {{ __('Program Prioritas') }}
                        @elseif (Route::currentRouteName() === 'proker.show')
                        {{ __('Daftar Program Prioritas') }}
                        @elseif (Route::currentRouteName() === 'proker.store')
                        {{ __('Tambah Program Prioritas') }}
                        @elseif (Route::currentRouteName() === 'progpokok.show')
                        {{ __('Daftar Program Pokok') }}
                        
                        @endif
                    
                    </h2>
                </div>
            </header>
            
            <!-- Page Content -->
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-gray-200">
                            @if (Route::currentRouteName() === 'proker.show' || Route::currentRouteName() === 'proker.create')
                                @yield('content-table')
                            @elseif (Route::currentRouteName() === 'progpokok.show')
                                @yield('content-table-main')
                            @endif
                        
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script> 
</body>
</html>
