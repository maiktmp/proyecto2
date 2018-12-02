<?php
?>

@extends('template.main', [
    'title' => 'Lista de profesores'
])
@section('title', 'Profesores')

@push('scripts')
    <script src="{{ asset('commons/bootstrap_data_grid/bootstrap_data_grid.js?v=1') }}"></script>
    <script src="{{ asset('js/usuario/index.js') }}"></script>
@endpush

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div id="container-data-grid" class="mt-3"></div>
                <input id="inp-url-data-grid-content"
                       type="hidden"
                       value="{{ route('profesores_index_contents') }}"/>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 text-center">
                <a href="{{ route('profesores_agregar') }}"
                   class="btn btn-primary mt-3 pr-4">
                    <span class="fas fa-plus"></span>
                    <span>
                        &nbsp;&nbsp;
                        Registrar nuevo
                    </span>
                </a>
            </div>
        </div>
    </div>
@endsection
