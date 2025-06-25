@extends('layouts.cc.app')

@section('content')
    @can('Klien - Melihat Data')
        @livewire('cc.client.container')
    @endcan

    @canany(['Klien - Menambah Data', 'Klien - Mengubah Data', 'Klien - Menghapus Data'])
        @livewire('cc.client.modal-resource')
    @endcanany
@endsection

@push('page_styles')
    {{-- Raty --}}
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/raty-js/raty-js.css') }}" />
@endpush

@push('page_scripts')
    {{-- Raty --}}
    <script src="{{ asset('themes/cc/vendor/libs/raty-js/raty-js.js') }}"></script>
    @include('js.cc.client.index')
@endpush

