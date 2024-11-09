@extends('layouts.admin')

@section('page-heading')
    {{ __('Program Kerja') }}
@endsection

@if (isset($selectedProgram))
@elseif (Route::currentRouteName() === 'prog-transaksi.create')
    @section('content-form-header')
        {{ __('Isi form di bawah ini') }}
    @endsection
    @section('content-form-transaction')
        <x-admin.create-form :routeName="'prog-transaksi.create'">
            @include('admin.transaction.form')
            <x-slot name="formBody1">

                @yield('formBody1')
            </x-slot>
            <x-slot name="formBody2">
                @yield('formBody2')

            </x-slot>
            <x-slot name="formBody3">
                @yield('formBody3')

            </x-slot>
            <x-slot name="formBody4">
                @yield('formBody4')

            </x-slot>

            <x-slot name="formBody5">
                @yield('formBody5')

            </x-slot>

        </x-admin.create-form>
        <!-- Script JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                /* 
                    Program Pokok -> Prioritas Program
                */
                const priorityProgramSelect = document.getElementById('priority-program');
                const priorityProgramNameInput = document.getElementById('nama-program');

                // Event listener saat dropdown berubah
                priorityProgramSelect.addEventListener('change', function() {
                    const selectedOption = priorityProgramSelect.options[priorityProgramSelect.selectedIndex];
                    const priorityName = selectedOption.getAttribute('data-priority-name');

                    // Set nilai pada input nama program prioritas
                    priorityProgramNameInput.value = priorityName || '';
                });

                /* 
                    Mitra -> Mitra terpilih
                */
                const mitraSelect = document.getElementById('mitra-select');
                const selectedMitraContainer = document.getElementById('selected-mitra-container');
                const selectedMitras = new Set(); // Gunakan Set untuk mencegah duplikasi

                // Fungsi untuk menambahkan mitra
                function addMitra() {
                    const selectedOption = mitraSelect.options[mitraSelect.selectedIndex];

                    // Lewati jika tidak ada pilihan atau sudah dipilih sebelumnya
                    if (!selectedOption || selectedOption.value === '' || selectedMitras.has(selectedOption.value)) {
                        return;
                    }

                    // Hapus teks default jika ada
                    const defaultText = selectedMitraContainer.querySelector('.text-gray-500');
                    if (defaultText) {
                        defaultText.remove();
                    }

                    // Tambahkan ke set mitra yang dipilih
                    selectedMitras.add(selectedOption.value);

                    // Buat elemen badge untuk mitra yang dipilih
                    const mitraBadge = document.createElement('div');
                    mitraBadge.classList.add(
                        'inline-flex',
                        'items-center',
                        'px-2',
                        'py-1',
                        'bg-blue-100',
                        'text-blue-800',
                        'text-xs',
                        'font-medium',
                        'rounded-full',
                        'mb-1',
                        'mr-1'
                    );

                    // Tambahkan nama mitra dan tombol hapus
                    mitraBadge.innerHTML = `
                        ${selectedOption.text}
                        <input type="hidden" name="mitra[]" value="${selectedOption.value}">
                        <span class="ml-2 cursor-pointer" onclick="removeMitra(this, '${selectedOption.value}')">✕</span>
                    `;

                    // Tambahkan ke kontainer
                    selectedMitraContainer.appendChild(mitraBadge);

                    // Reset pilihan select
                    mitraSelect.selectedIndex = 0;

                    // Tambahkan pesan default jika tidak ada mitra
                    if (selectedMitras.size === 0) {
                        const defaultText = document.createElement('div');
                        defaultText.classList.add('text-gray-500');
                        defaultText.textContent = 'Belum ada mitra dipilih';
                        selectedMitraContainer.appendChild(defaultText);
                    }
                }

                // Fungsi untuk menghapus mitra
                window.removeMitra = function(element, value) {
                    // Hapus badge
                    element.closest('div').remove();

                    // Hapus dari set mitra yang dipilih
                    selectedMitras.delete(value);

                    // Tambahkan pesan default jika tidak ada mitra
                    if (selectedMitras.size === 0) {
                        const defaultText = document.createElement('div');
                        defaultText.classList.add('text-gray-500');
                        defaultText.textContent = 'Belum ada mitra dipilih';
                        selectedMitraContainer.appendChild(defaultText);
                    }
                }

                // Tambahkan event listener untuk perubahan pilihan
                mitraSelect.addEventListener('change', addMitra);

                // Tambahkan teks default saat halaman dimuat
                const defaultText = document.createElement('div');
                defaultText.classList.add('text-gray-500');
                defaultText.textContent = 'Tidak ada mitra yang dipilih';
                selectedMitraContainer.appendChild(defaultText);
            });
        </script>
    @endsection
@endif
