@extends('layouts.admin')


@section('page-heading')
    {{ __('Program Prioritas') }}
@endsection


@if (isset($selectedProgram))
    @section('content-form-header')
        {{ __('Edit Program') }}
    @endsection
    @section('content-form-edit')
      
    @endsection
@else
    @section('content-table-header')
        Daftar program
    @endsection

    @section('content-table')
        @include('admin.transaction.show')
    @endsection

    @section('content-form-header')
        @if (Route::currentRouteName() === 'prog-transaksi.edit')
            {{ __('Ubah Program') }}
        @elseif (Route::currentRouteName() === 'prog-transaksi.index')
            {{ __('Tambah Program') }}
        @endif
    @endsection

    @section('content-form')
       
    @endsection
@endif