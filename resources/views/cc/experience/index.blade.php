@extends('layouts.cc.app')

@section('content')
    @can('Pengalaman - Melihat Data')
        @livewire('cc.experience.container')
    @endcan

    @canany(['Pengalaman - Menambah Data', 'Pengalaman - Mengubah Data', 'Pengalaman - Menghapus Data'])
        @livewire('cc.experience.modal-resource')
    @endcanany
@endsection

@push('page_styles')
    {{-- Boostrap Datepicker --}}
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}">
@endpush

@push('page_scripts')
    {{-- Bootstrap Datepicker --}}
    <script src="{{ asset('themes/cc/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    @include('js.cc.experience.index')
@endpush

