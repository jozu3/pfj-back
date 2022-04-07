@extends('adminlte::page')

@section('title', 'Sesiones')

@section('content_header')
    <h2 class="txt-yellow-pfj font-weight-bold">{{ $programa->nombre }}</h2>
    <h1>Organizar Personal y Grupos</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <section class="content pb-3">
        <div class="container-fluid h-100">
            <div class="row">
                @foreach ($programa->grupos as $grupo)
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-row card-primary">
                            <div class="card-header bg-yellow-pfj">
                                <h3 class="card-title">
                                    {{ 'Grupo ' . $grupo->numero }}
                                </h3>
                            </div>
                            <div class="card-body group" id="group1">
                                @foreach ($grupo->companerismos as $companerismo)
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            @foreach ($companerismo->personale_companerismos as $personale_companerismo)
                                            <h5 class="card-title">{{ $personale_companerismo->personale->user->name }}</h5>
                                                
                                            @endforeach
                                            <div class="card-tools">

                                            </div>
                                        </div>
                                    </div>
{{-- 
                                    <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                            Digital Strategist
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-5 text-center">
                                                    <img src="../../dist/img/user2-160x160.jpg" alt="user-avatar"
                                                        class="img-circle img-fluid">
                                                </div>
                                                <div class="col-7">
                                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic
                                                        Artist / Coffee Lover
                                                    </p>
                                                    <ul class="fa-ul text-muted ml-4 mb-0">
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-building"></i></span> Address: Demo
                                                            Street 123, Demo City
                                                            04312, NJ</li>
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-phone"></i></span> Phone #: + 800 -
                                                            12 12 23 52</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="#" class="btn btn-sm bg-teal">
                                                    <i class="fas fa-comments"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-user"></i> View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                @endforeach




                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        </div>
    </section>


@stop

@section('css')
    <style type="text/css">
        .card-body {
            overflow: auto;
        }
        .bg-yellow-pfj{
            background-color: #fe9a18!important
        }
        .txt-yellow-pfj{
            color: #fe9a18
        }

    </style>
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        const nestedSortables = document.getElementsByClassName('group');

        for (var i = 0; i < nestedSortables.length; i++) {
            new Sortable(nestedSortables[i], {
                group: 'nested',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,

            });
        }
    </script>
@stop
