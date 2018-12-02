<?php
?>

@extends('template.main', [
    'title' => 'Registrar profesor'
])
@section('title', 'Profesores')

@section('content')
    <div class="container">
        {!! Form::open() !!}
            @include('usuario._form')
        {!! Form::close() !!}
    </div>
@endsection
