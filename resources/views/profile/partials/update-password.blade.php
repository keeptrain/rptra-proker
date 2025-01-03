<x-app-layout>
    @section('main-content')
        <div class="bg-transparent">
            <div class="mb-3 border-gray-200 dark:border-gray-700 ml-3">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab">
                    <li class="me-2" role="presentation">
                        <button onclick="window.location.href = '{{route('profile.setting')}}'" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->is('settings/profile*') ? ' border-purple-800' : '' }}" id="profile-styled-tab"
                            data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Profil</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button onclick="window.location.href = '{{route('profile.password.update')}}'"
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 {{ request()->is('settings/password*') ? ' border-purple-800' : '' }}"
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
            <!-- Update password -->
            <div class="p-6">
                <form action="{{ route('profile.password.update') }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="block items-center justify-start mb-4">
                        <span class="text-gray-600 font-medium">Password Sekarang</span>
                        <x-admin.text-input name="current_password" type="password" class=" w-full p-2.5 " ></x-admin.text-input>
                    </div>
                    <div class="block items-center justify-between mb-4">
                        <span class="text-gray-600 font-medium">Password Baru</span>
                        <x-admin.text-input name="password" type="password" class=" w-full p-2.5" required></x-admin.text-input>
                    </div>
                    <div class="block items-center justify-between mb-4">
                        <span class="text-gray-600 font-medium">Konfirmasi Password Baru</span>
                        <x-admin.text-input name="password_confirmation" type="password" class=" w-full p-2.5" required></x-admin.text-input>
                    </div>
                    <x-button class="bg-zinc-700 p-2.5">Ubah</x-button>
                </form>
            </div>
        </div>
    @endsection
</x-app-layout>
