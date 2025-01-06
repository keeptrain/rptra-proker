<x-app-layout>
    @section('main-content')
        <div class="bg-transparent">
            <div class="mb-3 border-gray-200 dark:border-gray-700 ml-3">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab">
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->is('settings/profile*') ? ' border-purple-800' : '' }}""
                            id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Profil</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button onclick="window.location.href = '{{ route('profile.password') }}'"
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Password</button>
                    </li>
                    {{-- <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">Settings</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Contacts</button>
                    </li> --}}
                </ul>
            </div>

        </div>
        <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-sm ">
            <div class="flex flex-col p-6">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <!-- Label -->
                    <label class="block text-sm font-bold text-gray-700 mb-4">
                        Foto Profil
                    </label>

                    <div class="flex  space-x-4">
                        <!-- Profile Picture -->
                        <div class="w-24 h-24 rounded-md overflow-hidden border border-gray-300">
                            <img src="{{ asset(Auth::user()->image) }}" name="display-profile" alt="Profile Picture"
                                class="w-full h-full object-cover">
                        </div>

                        <!-- Upload Button -->
                        <div class="flex flex-col">
                            <label
                                class="bg-zinc-500 text-white px-2 py-1 w-max shadow-md rounded-md hover:bg-blue-600 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 text-center">
                                Pilih Foto
                                <input type="file" name="image" class="hidden" accept="image/*" />
                            </label>
                            <span class="text-xs text-gray-500 mt-2 max-w-xs">
                                Ukuran gambar profil tidak lebih dari 2MB.
                            </span>
                        </div>
                    </div>

                    <!-- Profile Info -->
                    <div class="mt-6">
                        <div class="block items-center justify-start mb-4">
                            <span class="text-gray-600 font-medium">Nama Lengkap:</span>
                            <x-admin.text-input name="name" class=" w-full p-2.5 "
                                value="{{ Auth::user()->name }}"></x-admin.text-input>
                        </div>
                        <div class="block items-center justify-between mb-4">
                            <span class="text-gray-600 font-medium">Username:</span>
                            <x-admin.text-input name="email" class=" w-full p-2.5 "
                                value="{{ Auth::user()->email }}"></x-admin.text-input>
                        </div>
                        <x-button class="bg-zinc-700 p-2.5">Simpan Perubahan</x-button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputFile = document.querySelector('input[name="image"]');
        const displayProfile = document.querySelector('img[name="display-profile"]');

        inputFile.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                // Event saat file selesai dibaca
                reader.onload = function (e) {
                    displayProfile.src = e.target.result; // Mengubah src gambar
                };

                reader.readAsDataURL(file); // Membaca file sebagai Data URL
            }
        });
    });
</script>

