@php
        @endphp

@extends('template.main', [
    'title' => 'Calendario'
])
@section('title', 'Calendario')

@push('scripts')
    @if(Auth::user()->esAdmin())
        <script src="{{ asset('js/calendar/calendar_admin.js') }}"></script>
    @else
        <script src="{{ asset('js/calendar/calendar.js') }}"></script>
    @endif
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <div id='calendar'></div>
                <input id="inp-user-log" value="{{Auth::user()->id}}" hidden>
                @if(Auth::user()->esAdmin())
                    <input id="inp-url-events"
                           type="hidden"
                           value="{{route('calendar_all_events')}}">
                    <input id="inp-url-pending"
                           type="hidden"
                           value="{{route('admin_pending')}}">
                @else
                    <input id="inp-url-events"
                           type="hidden"
                           value="{{route('calendar_events')}}">
                @endif
                <div class="modal" id="modal-profesor">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Cambiar status</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h4>¿Desea cambiar el estatus?</h4>
                                            </div>
                                        </div>
                                        {!! Form::open([
                                        'id'=>'form-status-profesor',
                                         'url'=>route('admin_status_update',['agendaId'=>'FAKE_ID'])
                                        ]) !!}
                                        <div class="form-group">
                                            <div class="form-group">
                                                {!! Form::label(
                                                    'fk_id_estado',
                                                    'Estado:'
                                                ) !!}
                                                {{ Form::select(
                                                    'fk_id_estado',
                                                    \App\Http\Controllers\AgendaController::mapStatusProfe(),
                                                    null,
                                                    [
                                                    'class'=>'form-control'
                                                    ]
                                                )}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button id="form-submit" type="submit" class="btn btn-success">Aceptar</button>
                                    {!! Form::close() !!}
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="modal-status">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Cambiar estado</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="div-agenda-detail"></div>
                                        {!! Form::open([
                                        'id'=>'form-status',
                                         'url'=>route('admin_status_update',['agendaId'=>'FAKE_ID'])
                                        ]) !!}
                                        <div class="form-group">
                                            <div class="form-group">
                                                {!! Form::label(
                                                    'fk_id_estado',
                                                    'Estado:'
                                                ) !!}
                                                {{ Form::select(
                                                    'fk_id_estado',
                                                    \App\Http\Controllers\AgendaController::mapStatusAdmin(),
                                                    null,
                                                    [
                                                    'id'=>'state_all',
                                                    'class'=>'form-control'
                                                    ]
                                                )}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                {!! Form::label(
                                                    'fk_id_estado',
                                                    'Estado:'
                                                ) !!}
                                                {{ Form::select(
                                                    'fk_id_estado',
                                                    \App\Http\Controllers\AgendaController::mapStatusAdminCancel(),
                                                    null,
                                                    [
                                                    'id'=>'state_cancel',
                                                    'class'=>'form-control'
                                                    ]
                                                )}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button id="form-submit" type="submit" class="btn btn-success">Aceptar</button>
                                    {!! Form::close() !!}
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="modal-agenda">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Agendar sala</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="col-date" class="col"></div>
                                        {!! Form::open(['id'=>'form-cita']) !!}
                                        <div id="form-content"></div>

                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button id="form-submit" type="submit" class="btn btn-success">Aceptar</button>
                                {!! Form::close() !!}
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection