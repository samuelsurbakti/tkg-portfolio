@extends('layouts.cc.app')

@section('content')
    <div class="row g-6" id="masonry_data">
        @can('Beranda - Melihat Informasi Pribadi')
            @livewire('cc.home.personal-information.container')
        @endcan

        @can('Beranda - Melihat Keahlian')
            @livewire('cc.home.skill.table')
        @endcan

        @can('Beranda - Melihat Media Sosial')
            @livewire('cc.home.social-media.table')
        @endcan

        @can('Beranda - Melihat Statistik')
            @livewire('cc.home.statistic.table')
        @endcan

        @can('Beranda - Melihat Profesi')
            @livewire('cc.home.profession.table')
        @endcan
    </div>

    @can('Beranda - Mengubah Informasi Pribadi')
        @livewire('cc.home.personal-information.modal-resource')
    @endcan

    @canany(['Beranda - Menambah Keahlian', 'Beranda - Mengubah Keahlian', 'Beranda - Menghapus Keahlian'])
        @livewire('cc.home.skill.modal-resource')
    @endcanany

    @canany(['Beranda - Menambah Media Sosial', 'Beranda - Mengubah Media Sosial', 'Beranda - Menghapus Media Sosial'])
        @livewire('cc.home.social-media.modal-resource')
    @endcanany

    @canany(['Beranda - Menambah Statistik', 'Beranda - Mengubah Statistik', 'Beranda - Menghapus Statistik'])
        @livewire('cc.home.statistic.modal-resource')
    @endcanany

    @canany(['Beranda - Menambah Profesi', 'Beranda - Mengubah Profesi', 'Beranda - Menghapus Profesi'])
        @livewire('cc.home.profession.modal-resource')
    @endcanany
@endsection

@push('page_styles')
    {{-- Boostrap Datepicker --}}
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}">

    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
@endpush

@push('page_scripts')
    {{-- Masonry --}}
    <script src="{{ asset('themes/cc/vendor/libs/masonry/masonry.js') }}"></script>

    {{-- Bootstrap Datepicker --}}
    <script src="{{ asset('themes/cc/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    {{-- Datatables --}}
    <script src="{{ asset('themes/cc/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    @include('js.cc.home.index')
@endpush

