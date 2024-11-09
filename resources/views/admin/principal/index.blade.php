@extends('layouts.admin')

@section('page-heading')
    {{ __('Program pokok') }}
@endsection


@if (isset($selectedProgram))
    @section('content-form-header')
        {{ __('Edit Program') }}
    @endsection
    @section('content-form-edit')
        <x-admin.edit-form :routeName="'prog-pokok.update'" :routeParam="$selectedProgram->id" :routeBack="'prog-pokok.index'">
            <x-slot name="formBody">
                @include('admin.principal.edit')
            </x-slot>
        </x-admin.edit-form>
    @endsection
@else
    @section('content-table-header')
        Daftar program
    @endsection

    @section('content-table')
        @include('admin.principal.show')
    @endsection
    
    @section('content-form')
        <x-admin.add-form :routeName="'prog-pokok.store'">
            <x-slot name="formBody">
                <!-- Konten form edit di sini -->
                @include('admin.principal.create')
            </x-slot>
        </x-admin.add-form>
    @endsection
@endif
