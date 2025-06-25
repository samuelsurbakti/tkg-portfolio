@extends('layouts.cc.app')

@section('content')
    @can('Akun - Melihat Data')
        <div class="card">
            <h5 class="card-header p-4 text-md-start text-center">Daftar Akun</h5>
            <div class="card-datatable table-responsive">
                <table id="account_table" class="table border-top table-responsive">
                    <thead>
                        <tr>
                            <th>Akun</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    @endcan

    @can('Akun - Menambah Data')
        @livewire('cc.account.modal-resource')
    @endcan
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

    @include('js.cc.account.index')
@endpush

