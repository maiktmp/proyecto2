@php
@endphp

@extends('template.main', [
    'title' => 'Bienvenido'
])
@section('title', 'Bienvenido')

@section('content')
    <div class="container">
        <div class="row mt-3 px-1 py-1" style="height: 400px">
            <div class="col-12 background-cover-center"
                 style="background-image: url('{{ asset('img/welcome.jpg') }}')">
            </div>
        </div>
    </div>
@endsection