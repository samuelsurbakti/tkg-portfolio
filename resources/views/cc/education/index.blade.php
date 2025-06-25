@extends('layouts.cc.app')

@section('content')
    @can('Pendidikan - Melihat Data')
        @livewire('cc.education.container')
    @endcan

    @canany(['Pendidikan - Menambah Data', 'Pendidikan - Mengubah Data', 'Pendidikan - Menghapus Data'])
        @livewire('cc.education.modal-resource')
    @endcanany
@endsection

@push('page_styles')
    {{-- Boostrap Datepicker --}}
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}">
@endpush

@push('page_scripts')
    {{-- Bootstrap Datepicker --}}
    <script src="{{ asset('themes/cc/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    @include('js.cc.education.index')
@endpush

