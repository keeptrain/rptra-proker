@extends('layouts.admin')

@section('alert')
    @if (session()->has('alert'))
        <x-admin.alert :type="session('alert.type')" :title="session('alert.title')" :message="session('alert.message')" />
    @endif
@endsection


@section('content-table-header')
    Daftar program
@endsection

@section('content-table')
    @include('admin.priority.show')
    <x-admin.modal />
@endsection

@section('content-form-header')
   
    @if (Route::currentRouteName() === 'prog-prioritas.edit')
    {{ __('Ubah Program') }}
    @elseif (Route::currentRouteName() === 'prog-prioritas.index')
    {{ __('Tambah Program') }}
    @endif
@endsection





@section('content-form')

    <x-admin.add-form :route="'prog-prioritas.store'">
        <x-slot name="formBody">
            <!-- Konten form di sini -->
            @include('admin.priority.create')
        </x-slot>
    </x-admin.add-form>
  
@endsection


@isset($selectedProgram)
@section('content-form-edit')
    
<x-admin.add-form :route="'prog-prioritas.update'">
    <x-slot name="formBody">
        <!-- Konten form di sini -->
        @include('admin.priority.edit')
    </x-slot>
</x-admin.add-form>
@endsection
@endisset

