<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary rounded">
                <div class="row w-100">
                    <div class="col-6 mt-2">
                        <div class="row">
                            <div class="col-3">
                                <span class="text-bold color-white">{{ $title }}</span>
                            </div>
                            <div class="col-9">
                                @if(Auth::check())
                                    @if(!Auth::user()->esAdmin())
                                        <span class="text-bold color-white">{{Auth::user()->getFullNameAttribute()}}</span>
                                    @else
                                        <span class="text-bold color-white">Administrador</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6 w-100">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav" style="margin-left: auto">
                                @if(Auth::check())
                                    @if(Auth::user()->esAdmin())
                                        <li class="nav-item active">
                                            <div class="btn-group">
                                                <a class="nav-link" href="{{route('calendar_show')}}">Agenda</a>
                                                <button type="button"
                                                        id="count-pending"
                                                        class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" id="list-events">

                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('profesores_index') }}">Profesores</a>
                                        </li>
                                    @else
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{route('calendar_show')}}">Agenda</a>
                                        </li>
                                    @endif
                                    <li class="nav-item active" style="margin-right: auto">
                                        <a class="nav-link" href="{{ route('logout') }}">Cerrar sesión</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>