<x-app-layout>
    @section('main-content')
        <div
            class="bg-white dark:bg-zinc-900 text-black dark:text-neutral-100 rounded-md border-2 border-slate-100 dark:border-zinc-900  overflow-auto">
            <div class="border-b pl-6 pr-6 pt-4 pb-4 ">
                <div class="flex justify-between items-center ">

                    <x-admin.input-label>
                        {{ __('TAMBAH PROGRAM PRIORITAS') }}
                    </x-admin.input-label>

                    <x-button onclick="window.location.href='{{ route('prog-mitra.index') }}';"
                        class="p-1 bg-zinc-600 dark:hover:bg-zinc-700 flex items-center">
                        <!-- Ikon Kembali -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12H3m0 0l6-6m-6 6l6 6" />
                        </svg>
                        Kembali
                    </x-button>
                </div>
            </div>

            <div class="p-6">
                <x-admin.create-edit-form :routeName="route(
                    'prog-mitra.' . (isset($selectedProgram) ? 'update' : 'store'),
                    $selectedProgram->id ?? null,
                )">
                    <x-slot name="formBody">
                        @csrf
                        @method('POST')
                        @if (isset($selectedProgram))
                            @method('PUT')
                        @endif

                        <!-- Nama Program -->
                        <div class="flex items-center mb-4">
                            <x-admin.input-label class="w-1/4">
                                Nama Mitra
                            </x-admin.input-label>

                            <x-admin.text-input class="flex-1 p-2.5" type="text" name="name"
                                placeholder="Masukkan nama mitra"
                                value="{{ isset($selectedProgram) ? $selectedProgram->name : old('name') }}" required />
                        </div>

                        <!-- Prefix ID -->
                        <div class="flex items-center mb-4">
                            <x-admin.input-label class="w-1/4">
                                ID Mitra
                            </x-admin.input-label>

                            <div class="flex flex-1 gap-2">
                                <x-admin.text-input id="prefix-id" class="flex-1 p-2.5" type="text" name="prefix"
                                    placeholder="Masukkan prefix ID, misal: MITRA"
                                    value="{{ isset($selectedProgram) ? $prefix : old('prefix') }}" required />
                                <x-admin.text-input id="number" class="w-1/5 p-2.5" type="text" name="number"
                                    placeholder="Nomor" value="{{ isset($selectedProgram) ? $number : old('number') }}"
                                    oninput="numberOnly(this.id);" maxlength="3" required />

                                <!-- Panah -->
                                <div class="flex items-center justify-center ">
                                    <svg class="feather feather-arrow-right" fill="none" height="24"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" width="24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="5" x2="19" y1="12" y2="12" />
                                        <polyline points="12 5 19 12 12 19" />
                                    </svg>
                                </div>

                                <x-admin.text-input type="text" id="nama-id" name="id" class="flex-1 p-2.5 "
                                    placeholder="Mitra ID akan terbentuk ..."
                                    value="{{ isset($selectedProgram) ? $selectedProgram->id : old('id') }}" readonly />
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="nameButton">
                        @isset($selectedProgram)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="h-5 w-5 text-white mr-1" viewBox="0 0 16 16">
                                <path
                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                            </svg>
                            Ubah
                        @endisset

                        @empty($selectedProgram)
                            <svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5 text-white mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah
                        @endisset
                    </x-slot>

                </x-admin.create-edit-form>
            </div>
        </div>
    @endsection

</x-app-layout>
