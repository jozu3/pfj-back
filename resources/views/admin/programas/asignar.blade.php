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
       @livewire('admin.asignar-personal', ['programa' => $programa], key($programa->id))
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
        const grupos = document.getElementsByClassName('group');
        const compas = document.getElementsByClassName('companerismo');

        for (var i = 0; i < grupos.length; i++) {
            new Sortable(grupos[i], {
                group: 'grupos',
                sort: false,
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                onEnd: ()=>{
                    console.log('se inserto un elemento')
                },
                store: {
                    //guardamos el orden
                    set:(sortable) => {
                        const orden = sortable.toArray();
			            localStorage.setItem(sortable.options.group.name, orden.join('|'));
                        console.log(orden)
                        //Livewire.emit('moverCompanerismo')

                    },
                    // Obtenemos el orden de la lista
                    get: (sortable) => {
                        const orden = localStorage.getItem(sortable.options.group.name);
                        return orden ? orden.split('|') : [];
                    }
                }

            });
        }

        for (var i = 0; i < compas.length; i++) {
            new Sortable(compas[i], {
                group: 'companerismos',
                sort: false,
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                onEnd: ()=>{
                    console.log('se inserto un personal')
                },
                store: {
                    //guardamos el orden
                    set:(sortable) => {
                        const orden = sortable.toArray();
			            localStorage.setItem(sortable.options.group.name, orden.join('|'));
                        console.log(orden)
                        // Livewire.emit('moverPersonal')
                    },
                    // Obtenemos el orden de la lista
                    get: (sortable) => {
                        const orden = localStorage.getItem(sortable.options.group.name);
                        return orden ? orden.split('|') : [];
                    }
                }

            });
        }
    </script>
@stop
