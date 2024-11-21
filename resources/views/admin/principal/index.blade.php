<x-app-layout>
    @section('name-content')
        {{ __('LIST PROGRAM POKOK') }}



        <div>
            <x-button id="delete-selected-button" type="button" color="red" class="hidden" class="mr-2">Hapus</x-button>

            <x-button onclick="window.location.href='{{ route('prog-pokok.create') }}'">Tambah Program</x-button>
        </div>
    @endsection
    <x-slot name="main">
        @include('admin.principal.show')


    </x-slot>
</x-app-layout>
