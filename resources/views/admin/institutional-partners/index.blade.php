<x-app-layout>
    @section('name-content')
        {{ __('LIST MITRA') }}

        <div>
            <x-button id="delete-selected-button" type="button" color="red" class="hidden">Hapus</x-button>

            <x-button onclick="window.location.href='{{ route('prog-mitra.create') }}'">Tambah Mitra</x-button>
        </div>


    @endsection

    <x-slot name="main">
        @include('admin.institutional-partners.show')
    </x-slot>
</x-app-layout>

