<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary rounded">
                <div class="row w-100">
                    <div class="col-6 mt-2">
                        <span class="text-bold color-white">{{ $title }}</span>
                    </div>
                    <div class="col-6 w-100">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav" style="margin-left: auto">
                                @if(Auth::check())
                                    @if(Auth::user()->esAdmin())
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('profesores_index') }}">Profesores</a>
                                        </li>
                                    @else
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#">Agenda</a>
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