@extends('layouts.cc.app')

@section('content')
    @can('Sistem - Melihat Peran')
        @livewire('cc.system.role-container')
    @endcan

    @can('Sistem - Melihat Izin')
        <div class="card">
            <h5 class="card-header p-4 text-md-start text-center">Daftar Izin</h5>
            <div class="card-datatable table-responsive">
                <table id="permission_table" class="table border-top table-responsive">
                    <thead>
                        <tr>
                            <th>Jenis</th>
                            <th>Menu</th>
                            <th>Izin</th>
                            <th>Urutan</th>
                            <th>Diberikan Kepada</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    @endcan

    @canany(['Sistem - Menambah Peran', 'Sistem - Mengubah Peran'])
        @livewire('cc.system.role-modal-resource')
    @endcanany

    @can('Sistem - Memberi Hak Akses')
        @livewire('cc.system.modal-authorization')
    @endcan

    @canany(['Sistem - Menambah Izin', 'Sistem - Mengubah Izin'])
        @livewire('cc.system.permission-modal-resource')
    @endcanany
@endsection

@push('page_styles')
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />

    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/select2/select2.css') }}" />
@endpush

@push('page_scripts')
    {{-- Datatables --}}
    <script src="{{ asset('themes/cc/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    {{-- Select2 --}}
    <script src="{{ asset('themes/cc/vendor/libs/select2/select2.js') }}"></script>

    @include('js.cc.system.index')
@endpush

