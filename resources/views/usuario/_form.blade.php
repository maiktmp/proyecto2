@php
@endphp

<div class="row">
    @if ($errors->has('general'))
        <div class="col">
            <div class="alert alert-danger">
                <p>{{ $errors->first('general') }}</p>
            </div>
        </div>
    @endif
</div>

<div class="row mt-5">
    <div class="col-12">
        <div class="row">
            <div class="col-4 group">
                <div class="form-group {{$errors->has('nombre') ? 'has-error' : ''}}">
                    {!! Form::label('nombre', 'Nombre(s)', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('nombre'))
                        <span class="help-block">{{ $errors->first('nombre') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-4 group">
                <div class="form-group {{$errors->has('apellidoP') ? 'has-error' : ''}}">
                    {!! Form::label('apellidoP', 'Ap. paterno', ['class' => 'control-label']) !!}
                    {!! Form::text('apellidoP', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('apellidoP'))
                        <span class="help-block">{{ $errors->first('apellidoP') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-4 group">
                <div class="form-group {{$errors->has('apellidoM') ? 'has-error' : ''}}">
                    {!! Form::label('apellidoM', 'Ap. materno', ['class' => 'control-label']) !!}
                    {!! Form::text('apellidoM', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('apellidoM'))
                        <span class="help-block">{{ $errors->first('apellidoM') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4 offset-2 group">
                <div class="form-group {{$errors->has('correo') ? 'has-error' : ''}}">
                    {!! Form::label('correo', 'Correo', ['class' => 'control-label']) !!}
                    {!! Form::text('correo', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('correo'))
                        <span class="help-block">{{ $errors->first('correo') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-4 group">
                <div class="form-group {{$errors->has('telefono') ? 'has-error' : ''}}">
                    {!! Form::label('telefono', 'Telefono', ['class' => 'control-label']) !!}
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('telefono'))
                        <span class="help-block">{{ $errors->first('telefono') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-4 offset-2 group">
                <div class="form-group {{$errors->has('usuario') ? 'has-error' : ''}}">
                    {!! Form::label('usuario', 'Usuario', ['class' => 'control-label']) !!}
                    {!! Form::text('usuario', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('usuario'))
                        <span class="help-block">{{ $errors->first('usuario') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-4 group">
                <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                    {!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-center my-3">
                {!!
                    Form::submit(
                    isset($user) ? 'Modificar' : 'Crear',
                    ['class' => 'btn btn-success btn-lg',
                    'style' => 'width: 200px'])
                !!}
            </div>
        </div>
    </div>
</div>


