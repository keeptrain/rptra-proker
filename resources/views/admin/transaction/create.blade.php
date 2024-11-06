@extends('layouts.admin')

@section('content-table')
    <x-admin.add-form>
        <x-slot name="formBody">
            @include('admin.transaction.form')
        </x-slot>
    </x-admin.add-form>
    
@endsection