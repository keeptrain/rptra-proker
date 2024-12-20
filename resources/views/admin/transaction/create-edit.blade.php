<x-app-layout>
    @section('main-content')

        <div class="mt-6 mb-6 ">
            <div class="flex justify-between items-center ">
                <x-admin.input-label>
                    {{ __('ISI FORM UNTUK PROGRAM KERJA ') }}
                </x-admin.input-label>

                <x-button onclick="window.location.href='{{ url()->previous() }}';" color="zinc" class="p-1 bg-zinc-600 dark:hover:bg-zinc-700 flex items-center">
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

        <div x-data="{ openModal: false }">
            <x-admin.transaction-form :routeName="route(
                'prog-transaksi.' . (isset($selectedProgram) ? 'update' : 'store'),
                $selectedProgram->id ?? null,
            )">
                <x-slot name="formBody1">
                    @csrf
                    @method('POST')
                    @if (isset($selectedProgram))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
                        <!-- Program Pokok -->
                        <div>
                            @include('admin.transaction.partials.program-principal')
                        </div>

                        <!-- Panah -->
                        <div class="flex items-center justify-center pb-2.5 text-gray-600 dark:text-zinc-300">
                            <svg class="feather feather-arrow-right" fill="none" height="24" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <line x1="5" x2="19" y1="12" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </div>

                        <!-- Program Prioritas -->
                        <div>
                            @include('admin.transaction.partials.program-priority')
                        </div>
                    </div>

                </x-slot>
                <x-slot name="formBody2">
                    @include('admin.transaction.partials.information-activity')
                </x-slot>


                <x-slot name="formBody3">
                    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
                        <!-- Jadwal dan lokasi kegiatan -->
                        @include('admin.transaction.partials.datetime-location')
                    </div>
                </x-slot>

                <x-slot name="formBody4">
                    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
                        <!-- Mitra lembaga -->
                        <div>
                            @include('admin.transaction.partials.institutional-partner')
                        </div>
                    </div>
                </x-slot>

                @push('modal')
                    <x-admin.modal :saveIdButton="'saveDraftButton'">
                        @section('content-modal')
                            {{-- <p>Apakah kamu yakin untuk menyimpan draft ini?</p> --}}
                            <form id="draftForm">
                                <div class="mb-4">
                                    <input type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                                        id="draftName" name="draftName" placeholder="Masukkan nama untuk draft">
                                </div>
                            </form>
                        @endsection
                        <x-slot name="nameButton">
                            Simpan draft
                        </x-slot>
                    </x-admin.modal>
                @endpush

            @section('button-content')
                @if (isset($selectedProgram))
                    <button type="submit" id="submitButton"
                        class="px-8 py-3 bg-blue-600 text-white font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ubah
                    </button>
                @endif

                @if (Route::currentRouteName() === 'prog-transaksi.create')
                    <button x-on:click="openModal = !openModal" type="button" id="submitButton"
                        class="px-8 py-3 bg-white text-black font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-white dark:hover:bg-gray-200 dark:focus:ring-blue-800">
                        Save to draft
                    </button>
                    <button type="submit" id="submitButton"
                        class="px-8 py-3 bg-blue-600 text-white font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create
                    </button>
                @endif
            @endsection


        </x-admin.transaction-form>
    </div>


    <!-- Script JavaScript -->
    <script src="{{ asset('js/create-form/selected-principal.js') }}"></script>
    <script src="{{ asset('js/create-form/multiple-select.js') }}"></script>
    <!--script src="{{ asset('js/create-form/modal-draft.js') }}"></script-->

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const options = {
                placeholder: 'Masukkan teks disini...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }],
                        ['link']
                    ]
                },
                theme: 'snow',
            };
            
            

            var editor = new Quill('#quill-editor', options);

            if (document.getElementById("quill-editor-area")) {
                var quillEditor = document.getElementById("quill-editor-area");

                // Set konten editor dengan nilai dari textarea
                editor.root.innerHTML = quillEditor.value;

                // Update textarea saat konten di Quill editor berubah
                editor.on("text-change", function() {
                    let rawHtml = editor.root.innerHTML;

                    // Update hidden textarea dengan konten yang sudah dimodifikasi
                    quillEditor.value = rawHtml;
                });

                // Update Quill editor saat textarea diubah
                quillEditor.addEventListener("input", function() {
                    editor.root.innerHTML = quillEditor.value;
                });
            }

            function resetQuillEditor() {
                editor.setText("");
            }

            initSelectedPrincipal();
        });
    </script>
@endsection
</x-app-layout>
