<x-app-layout>
    @section('name-content')
        {{ __('LIST PROGRAM PRIORITAS ') }}

        <div> 
            <x-button id="delete-selected-button" type="button" color="red" class="hidden">Hapus</x-button>

            <x-button onclick="window.location.href='{{ route('prog-prioritas.create') }}'">Tambah Program</x-button>
        </div>
    @endsection



    <x-slot name="main">
        @include('admin.priority.show')
    </x-slot>

</x-app-layout>

