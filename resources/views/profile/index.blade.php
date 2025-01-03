<x-app-layout>
    @section('main-content')
        <div class="bg-white dark:bg-zinc-900  rounded-lg shadow-sm p-6">
            <div class="flex items-center space-x-6">
                <!-- Profile Picture -->
                <div class="relative w-32 h-32">
                    <!-- Profile Picture -->
                    <div class="w-full h-full rounded-full overflow-hidden border border-gray-300">
                        <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
                    </div>

                    <!-- Edit Icon -->
                    <button onclick="window.location.href = '{{route('profile.setting')}}'"
                        class="absolute bottom-0 right-0 bg-white text-white dark:bg-zinc-800 rounded-full p-2 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                        title="Edit Foto Profil">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-black dark:text-white fill-current" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                          </svg>
                    </button>
                </div>
                <!-- User Info -->
                <div class="flex flex-col text-gray-600 dark:text-gray-300">
                    <!-- Welcome Message -->
                    <p class=" text-lg font-medium">
                        Selamat datang ,
                    </p>

                    <!-- User Name -->
                    <span class="text-2xl font-bold ">
                        {{ Auth::user()->name }}
                    </span>

                    <!-- User Role -->
                    <span class="mt-2  text-sm font-medium">
                        Role: {{ Auth::user()->role ?? 'Tidak Ada Role' }}
                    </span>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex justify-end">
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <x-button class="bg-red-500 text-white px-4 py-2 shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                        Logout
                    </x-button>
                </form>
            </div>
        </div>
    @endsection
</x-app-layout>
