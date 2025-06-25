@extends('layouts.cc.app')

@section('content')
    <div class="row">
        <div class="{{ (auth()->user()->can('Pekerjaan - Melihat Kategori') ? 'col-8' : 'col-12') }}">
            @can('Pekerjaan - Melihat Data')
                @livewire('cc.work.container')
            @endcan
        </div>
        @can('Pekerjaan - Melihat Kategori')
            <div class="col-4">
                @can('Pekerjaan - Menambah Data')
                    <div class="card text-center mb-4">
                        <div class="card-body d-flex flex-column flex-fill justify-content-between align-items-center">
                            <h5 class="card-title">Update Riwayat Pekerjaan</h5>
                            <div class="d-flex align-items-end justify-content-center mt-sm-0 mt-3">
                                <img src="{{ asset('themes/cc/img/illustrations/work-light.svg') }}" class="img-fluid me-n3" alt="Image" data-app-light-img="illustrations/work-light.svg" data-app-dark-img="illustrations/work-dark.svg" width="120px">
                            </div>
                            <p class="card-text">Ada pekerjaan baru? Klik tombol di bawah untuk menambahkannya, gampang kok!</p>
                            <button type="button" class="btn btn-primary" id="btn_add" data-bs-target="#modal_resource" data-bs-toggle="modal" >
                                <span class="icon-base bx bx-plus icon-xs me-2"></span>Tambahkan
                            </button>
                        </div>
                    </div>
                @endcan

                <div class="card">
                    <div class="card-header">
                        <div class="card-title header-elements">
                            <h5 class="m-0 me-2">Daftar Kategori</h5>
                            <div class="card-title-elements ms-auto">
                                <button type="button" id="btn_category_add" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#category_modal_resource" >
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive">
                        <table id="category_table" class="table border-top table-responsive">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        @endcan
    </div>

    @canany(['Pekerjaan - Menambah Data', 'Pekerjaan - Mengubah Data', 'Pekerjaan - Menghapus Data'])
        @livewire('cc.work.modal-resource')
    @endcanany

    @canany(['Pekerjaan - Menambah Kategori', 'Pekerjaan - Mengubah Kategori', 'Pekerjaan - Menghapus Kategori'])
        @livewire('cc.work.category-modal-resource')
    @endcanany

    @canany(['Pekerjaan - Menambah Foto Pekerjaan', 'Pekerjaan - Menghapus Foto Pekerjaan'])
        @livewire('cc.work.photo-modal-resource')
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

    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/select2/select2.css') }}" />
@endpush

@push('page_scripts')
    {{-- Bootstrap Datepicker --}}
    <script src="{{ asset('themes/cc/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    {{-- Datatables --}}
    <script src="{{ asset('themes/cc/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    {{-- Select2 --}}
    <script src="{{ asset('themes/cc/vendor/libs/select2/select2.js') }}"></script>

    @include('js.cc.work.index')
@endpush

