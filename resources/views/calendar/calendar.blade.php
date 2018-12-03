@php
        @endphp

@extends('template.main', [
    'title' => 'Calendario'
])
@section('title', 'Calendario')

@push('scripts')
    <script src="{{ asset('js/calendar/calendar.js') }}"></script>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <div id='calendar'></div>
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
                                    <div id="col-date" class="col">
                                        <input id="inp-url-events" type="hidden" value="{{route('calendar_events')}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
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
    </div>
@endsection