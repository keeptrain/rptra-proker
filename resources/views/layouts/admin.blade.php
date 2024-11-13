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
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>


        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen bg-gray-100 flex">
            <!-- Sidebar -->
            <div class="bg-white text-white">
                <x-admin.sidebar />
            </div>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <!-- Page Heading -->
                <header class="bg-gray-100 shadow mb-4">
                    <div class="p-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            <!-- Conditional heading based on route -->
                            @yield('page-heading')

                        </h2>
                    </div>
                </header>
                <!-- Page Content -->
                <div class="flex space-x-6">
                    @if (Route::currentRouteName() === 'prog-prioritas.index' ||
                            Route::currentRouteName() === 'prog-pokok.index' ||
                            Route::currentRouteName() === 'prog-mitra.index'||
                            Route::currentRouteName() === 'prog-transaksi.index')
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
                            <div class="w-2/4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                    @elseif (Route::currentRouteName() === 'prog-transaksi.create')
                        <div class="w-3/4 bg-transparent overflow-hidden ">
                            <div class="px-6 py-4 border-b bg-white rounded-md">
                                <h2 class="font-semibold text-lg bg-w text-gray-800">
                                    @yield('content-form-header')
                                </h2>
                            </div>
                            <div class="p-6 bg-transparent border-gray-200">
                                @yield('content-form-transaction')
                            </div>

                        </div>
                        <!-- component -->
                        <div class = "group fixed bottom-0 right-0 p-2  flex items-end justify-end w-24 h-24 ">
                            <!-- main -->
                            <div
                                class = "text-white shadow-xl flex items-center justify-center p-3 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 z-50 absolute  ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 group-hover:rotate-90   transition-all duration-[0.6s]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <!-- sub left -->
                            <div
                                class="absolute rounded-full transition-all duration-[0.2s] ease-out scale-y-0 group-hover:scale-y-100 group-hover:-translate-x-16   flex  p-2 hover:p-3 bg-green-300 scale-100 hover:bg-green-400 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                                </svg>
                            </div>
                            <!-- sub top -->
                            <div
                                class="absolute rounded-full transition-all duration-[0.2s] ease-out scale-x-0 group-hover:scale-x-100 group-hover:-translate-y-16  flex  p-2 hover:p-3 bg-blue-300 hover:bg-blue-400  text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.143 17.082a24.248 24.248 0 003.844.148m-3.844-.148a23.856 23.856 0 01-5.455-1.31 8.964 8.964 0 002.3-5.542m3.155 6.852a3 3 0 005.667 1.97m1.965-2.277L21 21m-4.225-4.225a23.81 23.81 0 003.536-1.003A8.967 8.967 0 0118 9.75V9A6 6 0 006.53 6.53m10.245 10.245L6.53 6.53M3 3l3.53 3.53" />
                                </svg>
                            </div>
                            <!-- sub middle -->
                            <div
                                class="absolute rounded-full transition-all duration-[0.2s] ease-out scale-x-0 group-hover:scale-x-100 group-hover:-translate-y-14 group-hover:-translate-x-14   flex  p-2 hover:p-3 bg-yellow-300 hover:bg-yellow-400 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>
                            </div>
                        </div>

                    @endif
                </div>
            </main>
        </div>

        <script type="text/javascript" src="{{ asset('build/assets/js/formSection.js') }}"></script>
        <!--script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script-->
       

    

        <!-- SweetAlert Error Alert Script -->
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                        confirmButtonColor: '#d33'
                    });
                });
            </script>
        @endif

        <!-- Success Alert (optional) -->
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: "{{ session('success') }}",
                        confirmButtonColor: '#3085d6'
                    });
                });
            </script>
        @endif
    </body>

</html>
