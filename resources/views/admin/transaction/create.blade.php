<x-app-layout>

    <x-slot name="main">
        <x-admin.create-form :routeName="isset($selectedProgram) ? 'prog-transaksi.update' : 'prog-transaksi.create'" :routeParam="isset($selectedProgram) ? $selectedProgram->id : null" :csrfMethod="isset($selectedProgram) ? 'PUT' : 'POST'">

            <x-slot name="formBody1">
                <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-end">
                    <!-- Program Pokok -->
                    <div>
                        @include('admin.transaction.partials.program-principal')
                    </div>

                    <!-- Panah -->
                    <div class="flex items-center justify-center pb-2.5">
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
                    <x-slot name="nameButton">
                        Simpan draft
                    </x-slot>
                    @section('content-modal')
                        <form id="draftForm">
                            <div class="mb-4">
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5"
                                    id="draftName" name="draftName" placeholder="Masukkan nama untuk draft">
                            </div>
                        </form>
                    @endsection
                </x-admin.modal>
            @endpush

        </x-admin.create-form>

        <!-- Script JavaScript -->
        <script src="{{ asset('js/create-form/selected-principal.js') }}"></script>
        <script src="{{ asset('js/create-form/multiple-select.js') }}"></script>
        <script src="{{ asset('js/create-form/modal-draft.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const options = {
                    placeholder: 'Masukkan teks disini...',
                    modules: {
                        toolbar: true
                    },
                    theme: 'snow'
                };

                var editor = new Quill('#quill-editor', options);


                if (document.getElementById("quill-editor-area")) {
                    var quillEditor = document.getElementById("quill-editor-area");

                    // Set konten editor dengan nilai dari textarea
                    editor.root.innerHTML = quillEditor.value;

                    // Update textarea saat konten di Quill editor berubah
                    editor.on("text-change", function() {
                        quillEditor.value = editor.root.innerHTML;
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
                initChoicesMultipleSelect();
            });
        </script>
    </x-slot>
</x-app-layout>
