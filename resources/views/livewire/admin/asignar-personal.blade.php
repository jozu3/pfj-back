<div>
    {{$alert}}
    {{$data}}
    <div class="container-fluid h-100">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card card-row card-primary">
                    <div class="card-header bg-yellow-pfj text-center">
                        <h3 class="card-title">
                            Cordinadores
                        </h3>
                    </div>
                    <div class="card-body group" >
                        <div class="card card-primary card-outline" >
                            <div class="card-header companerismo row" data-id="cordis">
                                    @forelse ($programa->coordinadores() as $inscripcione)
                                    <div class="col-6 p-0" data-id="{{ 'ins-' . $inscripcione->id}}">
                                        <div class="card text-center">
                                            <div class="card-header">
                                                <img class="img-fluid rounded-circle" src="{{ $inscripcione->personale->user->adminlte_image() }}" alt="">
                                            </div>
                                            <div class="card-body p-0">
                                                {{ $inscripcione->personale->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    {{-- <div class="col-12">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                No se ha asignado cordinadores
                                            </div>
                                        </div>
                                    </div> --}}
                                    @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
            @foreach ($programa->grupos as $grupo)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-row card-primary">
                        <div class="card-header bg-yellow-pfj">
                            <h3 class="card-title">
                                {{ 'Grupo ' . $grupo->numero }}
                            </h3>
                        </div>
                        <div class="card-body group" data-id="{{'grupo-'.$grupo->id}}">
                            @foreach ($grupo->companerismos as $companerismo)
                                <div class="card card-primary card-outline" data-id="{{'com-'.$companerismo->id}}">
                                    <div class="card-header companerismo row" data-id="{{'com-'.$companerismo->id}}"> 
                                        @foreach ($companerismo->inscripcioneCompanerismos as $inscripcioneCompanerismo)
                                        <div class="col-6 p-0" data-id="{{'ins-'.$inscripcioneCompanerismo->inscripcione->id}}">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <img class="img-fluid rounded-circle" src="{{ $inscripcioneCompanerismo->inscripcione->personale->user->adminlte_image() }}" alt="">
                                                    <div class="card-text"><small class="text-muted">{{ $inscripcioneCompanerismo->inscripcione->role->name }}</small></div>                                                   
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="card-text">{{ $inscripcioneCompanerismo->inscripcione->personale->user->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
