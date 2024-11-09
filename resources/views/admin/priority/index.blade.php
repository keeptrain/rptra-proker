@extends('layouts.admin')


@section('page-heading')
    {{ __('Program Prioritas') }}
@endsection


@if (isset($selectedProgram))
    @section('content-form-header')
        {{ __('Edit Program') }}
    @endsection
    @section('content-form-edit')
        <x-admin.edit-form :routeName="'prog-prioritas.update'" :routeParam="$selectedProgram->id" :routeBack="'prog-prioritas.index'">
            <x-slot name="formBody">
                @include('admin.priority.edit')
            </x-slot>
        </x-admin.edit-form>
    @endsection
@else
    @section('content-table-header')
        Daftar program
    @endsection

    @section('content-table')
        @include('admin.priority.show')
    @endsection

    @section('content-form-header')
        @if (Route::currentRouteName() === 'prog-prioritas.edit')
            {{ __('Ubah Program') }}
        @elseif (Route::currentRouteName() === 'prog-prioritas.index')
            {{ __('Tambah Program') }}
        @endif
    @endsection

    @section('content-form')
        <x-admin.add-form :routeName="'prog-prioritas.store'">
            <x-slot name="formBody">
                <!-- Konten form edit di sini -->
                @include('admin.priority.create')
            </x-slot>
        </x-admin.add-form>
    @endsection
@endif
