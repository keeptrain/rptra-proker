@extends('layouts.admin')


@section('page-heading')
    {{ __('Program Kerja') }}
@endsection


@if (isset($selectedProgram))
    @section('content-form-header')
        {{ __('Edit Program') }}
    @endsection
    @section('content-form-edit')
      
    @endsection
@else
    @section('content-table-header')
        {{ __('Daftar') }}
    @endsection

    @section('content-table')
        @include('admin.transaction.show-completed')
    @endsection

    @section('content-form-header')
        @if (Route::currentRouteName() === 'prog-transaksi.edit')
            {{ __('Ubah Program') }}
        @elseif (Route::currentRouteName() === 'prog-transaksi.index')
            {{ __('Draft') }}
        @endif
    @endsection

   
@endif