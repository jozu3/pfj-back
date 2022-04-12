@extends('adminlte::page')

@section('title', 'Sesiones')

@section('content_header')
    <h2 class="txt-yellow-pfj font-weight-bold">{{ $programa->nombre }}</h2>
    <h1>Organizar Personal y Grupos</h1>
    <button id="guardar" class="btn btn-success btn-sm">Guardar cambios</button>
    <div class="result"></div>

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
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <b>Se guardó correctamente!</b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@stop

@section('css')
    <style type="text/css">
        .card-body {
            overflow: auto;
        }

        .bg-yellow-pfj {
            background-color: #fe9a18 !important
        }

        .txt-yellow-pfj {
            color: #fe9a18
        }

        #success-alert {
            position: fixed;
            top: 150px;
            right: 5px;
        }

        .companerismo,
        .inscripcione {
            padding: 3px 6px;
        }

        .card-primary.card-outline {
            border-top: 3px solid #ffc907;
        }

        .group {
            padding: 2px
        }

    </style>
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        $().ready(function() {
            $("#success-alert").hide();
        });

        const grupos = document.getElementsByClassName('group');
        const compas = document.getElementsByClassName('companerismo');

        for (var i = 0; i < grupos.length; i++) {
            new Sortable(grupos[i], {
                group: 'grupo',
                sort: false,
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                onEnd: () => {
                    console.log('se inserto un elemento')
                },
                store: {
                    //guardamos el orden
                    set: (sortable) => {
                        const orden = sortable.toArray();
                        localStorage.setItem(sortable.el.getAttribute('data-id'), orden.join('|'));
                        //console.log(sortable.el)
                        //Livewire.emit('moverCompanerismo')

                    },
                    // Obtenemos el orden de la lista
                    get: (sortable) => {
                        const orden = localStorage.getItem(sortable.el.getAttribute('data-id'));
                        return orden ? orden.split('|') : [];
                    }
                }

            });
        }


        for (var i = 0; i < compas.length; i++) {
            new Sortable(compas[i], {
                group: 'companerismo',
                sort: false,
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                onEnd: () => {
                    console.log('se inserto un personal')
                },
                store: {
                    //guardamos el orden
                    set: (sortable) => {
                        const orden = sortable.toArray();
                        localStorage.setItem(sortable.el.getAttribute('data-id'), orden.join('|'));
                        //console.log(sortable)
                    },
                    // Obtenemos el orden de la lista
                    get: (sortable) => {
                        const orden = localStorage.getItem(sortable.el.getAttribute('data-id'));
                        return orden ? orden.split('|') : [];
                    }
                }

            });
        }

        var result = '?'



        $('#guardar').click(function() {
            let domain = (new URL(window.location.href));
            domain = domain.hostname;
            console.log(domain);

            for (let i = 0; i < localStorage.length; i++) {

                var k = localStorage.key(i)
                var value = localStorage.getItem(k)

                if (k.includes('com-') && value != '') {

                    console.log('compañerimso' + k.split('com-')[1])
                    let com = k.split('com-')[1]
                    let arr = value.split('|');
                    console.log('cant inscripcioen:' + arr.length)
                    for (let j = 0; j < arr.length; j++) {
                        const ins = arr[j].split('ins-')[1];
                        console.log(ins)
                        $.post(`{{ route('admin.index') }}/inscripcione_companerismos/updateInscripcione/` + ins, {
                                _token: "{{ csrf_token() }}",
                                companerismo_id: com
                            },
                            function(data, status) {
                                console.log("Data: " + data + "\nStatus: " + status);
                                $("#success-alert").show();
                                $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                                    $("#success-alert").slideUp(500);
                                });
                            }
                        );
                    }
                }

                if (k == 'cordis' && value != '') {
                    console.log('cordis')

                    let arr = value.split('|');
                    console.log('cant inscripcioen:' + arr.length)
                    for (let j = 0; j < arr.length; j++) {
                        const ins = arr[j].split('ins-')[1];
                        console.log(ins)
                        $.post(`{{ route('admin.index') }}/inscripcione_companerismos/updateInscripcione/` + ins, {
                                _token: "{{ csrf_token() }}",
                                cordis: 'cord'
                            },
                            function(data, status) {
                                console.log("Data: " + data + "\nStatus: " + status);
                                $("#success-alert").show();
                                $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                                    $("#success-alert").slideUp(500);
                                });
                            }
                        );
                    }
                }

                if (k.includes('grupo-') && value != '') {

                    console.log('grupo' + k.split('grupo-')[1])
                    let grupo = k.split('grupo-')[1]
                    let arr = value.split('|');
                    console.log('cant compañerismos:' + arr.length)
                    for (let j = 0; j < arr.length; j++) {
                        const comp = arr[j].split('com-')[1];
                        console.log(comp)

                        $.ajax({
                            type: "POST",
                            url: `{{ route('admin.companerismos.index') }}/`+ comp,
                            data: {
                                _method: 'PUT',
                                _token: "{{ csrf_token() }}",
                                grupo_id: grupo,
                                organigrama: 1
                            },
                            success: function(data, status) {
                                console.log("Data: " + data + "\nStatus: " + status);
                                $("#success-alert").show();
                                $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                                    $("#success-alert").slideUp(500);
                                });
                            },
                            error : function( data ) {
                                if( data.status === 422 ) {
                                    var errors = $.parseJSON(data.responseText);
                                    $.each(errors, function (key, value) {
                                        // console.log(key+ " " +value);
                                    $('#success-alert').addClass("alert alert-danger");

                                        if($.isPlainObject(value)) {
                                            $.each(value, function (key, value) {                       
                                                console.log(key+ " " +value);
                                            $('#success-alert').show().append(value+"<br/>");

                                            });
                                        }else{
                                        $('#success-alert').show().append(value+"<br/>"); //this is my div with messages
                                        }
                                    });
                                }
                            }
                        });

                        // $.post(`{{ route('admin.companerismos.index') }}/`+ comp,
                        //     {
                        //         _method: 'PUT',
                        //         _token: "{{ csrf_token() }}",
                        //         grupo_id: grupo
                        //     },
                        //     function(data, status) {
                        //         console.log("Data: " + data + "\nStatus: " + status);
                        //         $("#success-alert").show();
                        //         $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                        //             $("#success-alert").slideUp(500);
                        //         });
                        //     }
                        // );
                    }
                }

            }

        })
    </script>
@stop
