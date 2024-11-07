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
    @include('admin.principal.show')
@endsection

@section('content-form-header')
    {{ __('Tambah Program') }}
@endsection

@section('content-form')
    <x-admin.add-form :routeName="'prog-pokok.store'">
        <x-slot name="formBody" :programs="$principalPrograms">
            <!-- Konten form di sini -->
            @include('admin.principal.create')
        </x-slot>
    </x-admin.add-form>
@endsection
