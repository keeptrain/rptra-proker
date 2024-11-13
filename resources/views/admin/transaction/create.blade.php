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
        <script src="{{ asset('js/create-form/selected-principal.js') }}"></script>
        <script src="{{ asset('js/create-form/quill-activity-form.js') }}"></script>
       

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Kode yang ingin Anda jalankan setelah semua skrip dimuat
                // Misalnya, Anda bisa memanggil fungsi dari file JavaScript yang telah dimuat
                initSelectedPrincipal();
                //initSelectedPartners();
            });
        </script>
    @endsection
@endif
