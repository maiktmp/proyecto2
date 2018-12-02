<?php
?>

@extends('template.main', [
    'title' => 'Iniciar sesión'
])
@section('title', 'Iniciar sesión')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
                <div class="padding-8 text-center color-blue">
                    <h3 class="margin-bottom-0-forced margin-top-0">Iniciar sesión</h3>
                </div>
                <div class="padding-top-16 text-center">
                    <img id="img-preview"
                         src="{{asset('img/login.png')}}"
                         height="125px"
                         width="125px">
                </div>
                <form action="{{ route('login.auth') }}" method="POST">
                    {{csrf_field()}}
                    <div class="row pt-3 mx-5">
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                {{ Form::label('username', 'Usuario', ['class' => 'control-label']) }}
                                {{ Form::text('username', null, ['class' => 'form-control']) }}
                                @if($errors->has('username'))
                                    <span class="help-block">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                {{ Form::label('password', 'Contraseña', ['class' => 'control-label']) }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                                @if($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3 mb-5">
                            {{ Form::submit('Iniciar sesión', ['class' => 'btn btn-primary btn-md',
                                                               'style' => 'width: 150px']) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

