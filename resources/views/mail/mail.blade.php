@php
    /* @var $agenda \App\Models\Agenda*/
@endphp
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('template.global_css')

</head>
<body>
@include('components.header')
<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary rounded">
                <div class="row w-100">
                    <div class="col-12 mt-2 text-center">
                        <h1 class="color-white"><b>Aviso</b></h1>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body text-justify">
            <div class="row">
                <div class="col-8 offset-2">
                    <p> De la manera más atenta se le informa que la sala de titulación solicitada por el docente
                        <b>{{$agenda->usuario->getFullNameAttribute()}}</b>
                        para el alumno <b>{{$agenda->alumno}} ({{$agenda->no_control}})</b>
                        para la fecha <b>{{\App\Services\DateFormatterService::fullDatetime($agenda->fecha)}}</b>
                        ha sido <b>{{$agenda->estado->nombre}}</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.footer')
@include('template.global_js')
</body>
</html>