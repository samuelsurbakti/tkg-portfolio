@extends('layouts.cc.app')

@section('content')
    @can('Layanan - Melihat Data')
        @livewire('cc.service.container')
    @endcan

    @canany(['Layanan - Menambah Data', 'Layanan - Mengubah Data', 'Layanan - Menghapus Data'])
        @livewire('cc.service.modal-resource')
    @endcanany
@endsection

@push('page_styles')

@endpush

@push('page_scripts')
    @include('js.cc.service.index')
@endpush
