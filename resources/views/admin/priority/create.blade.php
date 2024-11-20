<x-app-layout>

    @section('name-content')
        {{ __('TAMBAH PROGRAM PRIORITAS') }}

        <x-button onclick="window.history.back();"  class="bg-zinc-600 dark:hover:bg-zinc-700">Kembali</x-button>
    @endsection

    <x-slot name="main">
        <x-admin.add-form :routeName="'prog-prioritas.store'">

            <x-slot name="formBody">
                @csrf
                @method('POST')
                <!-- Nama Program -->
                <div class="flex items-center mb-4">
                    <x-admin.input-label class="w-1/4">
                        Nama Program
                    </x-admin.input-label>

                    <x-admin.text-input class="flex-1 p-2.5" type="text" name="name"
                        placeholder="Masukkan nama program" value="{{ old('name') }}" required />
                </div>

                <!-- Prefix ID -->
                <div class="flex items-center mb-4">
                    <x-admin.input-label class="w-1/4">
                        ID Program
                    </x-admin.input-label>

                    <div class="flex flex-1 gap-2">
                        <x-admin.text-input id="prefix-id" class="flex-1 p-2.5" type="text" name="prefix"
                            placeholder="Masukkan prefix ID, misal: PPRIO" value="{{ old('prefix') }}" required />
                        <x-admin.text-input id="number" class="w-1/5 p-2.5" type="text" name="number"
                            placeholder="Nomor" value="{{ old('number') }}" oninput="numberOnly(this.id);"
                            maxlength="3" required />

                        <!-- Panah -->
                        <div class="flex items-center justify-center ">
                            <svg class="feather feather-arrow-right" fill="none" height="24" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <line x1="5" x2="19" y1="12" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </div>

                        <x-admin.text-input type="text" id="nama-id" name="id" class="flex-1 p-2.5 "
                            placeholder="Program ID akan terbentuk ..." value="{{ old('id') }}" readonly />
                    </div>

                    
                </div>
                
            </x-slot>
            
        </x-admin.add-form>
    </x-slot>

</x-app-layout>
