@extends('layouts.admin')




@if (isset($selectedProgram))
    @section('content-form-header')
        {{ __('Edit Program') }}
    @endsection
    @section('content-form-edit')
        <x-admin.edit-form :routeName="'prog-mitra.update'" :routeParam="$selectedProgram->id" :routeBack="'prog-mitra.index'">
            <x-slot name="formBody">
                @include('admin.institutional-partners.edit')
            </x-slot>
        </x-admin.edit-form>
    @endsection
@else
    @section('content-table-header')
        Daftar program
    @endsection

    @section('content-table')
        @include('admin.institutional-partners.show')
    @endsection

    @section('content-form-header')
        @if (Route::currentRouteName() === 'prog-mitra.edit')
            {{ __('Ubah Program') }}
        @elseif (Route::currentRouteName() === 'prog-mitra.index')
            {{ __('Tambah Program') }}
        @endif
    @endsection

    @section('content-form')
        <x-admin.add-form :routeName="'prog-mitra.store'">
            <x-slot name="formBody">
                <!-- Konten form edit di sini -->
                @include('admin.institutional-partners.create')
            </x-slot>
        </x-admin.add-form>
    @endsection
@endif
