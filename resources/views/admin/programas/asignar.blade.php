@extends('adminlte::page')

@section('title', 'Sesiones')

@section('content_header')
<button id="guardar" class="btn btn-success btn-sm">Guardar cambios</button>
    <h2 class="txt-yellow-pfj font-weight-bold">{{ $programa->nombre }}</h2>
    <h1>Organizar Personal y Grupos</h1>
    <div class="result"></div>
    <div id="cont-progress" class="progress" style="height: 20px;">
        <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"  ></div>
    </div>
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
        .bg-cordauxiliar{
            border-top: 3px solid #40bf1f;
        
        }
        
        </style>
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        $().ready(function() {
            $("#success-alert").hide();
            $('#cont-progress').hide();
            $('#guardar').attr('disabled','')

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
                        if (localStorage.length>0) {
                            $('#guardar').removeAttr('disabled')
                        } else {
                            $('#guardar').attr('disabled', '')
                        }

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
                        if (localStorage.length>0) {
                            $('#guardar').removeAttr('disabled')
                        } else {
                            $('#guardar').attr('disabled', '')
                        }
                    },
                    // Obtenemos el orden de la lista
                    get: (sortable) => {
                        const orden = localStorage.getItem(sortable.el.getAttribute('data-id'));
                        return orden ? orden.split('|') : [];
                    }
                }

            });
        }




        var cambios = 0;
        var prog = 0;
        var solucionados = 0;

        $('#guardar').click(function() {
            $("#progress").css('width', "0%");
            solucionados = 0;

            if(localStorage.length == 0){
                $('#success-alert').addClass("alert alert-warning");

                $('#success-alert').show().html("<b>No ha realizado cambios</b>");
                $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                    $("#success-alert").slideUp(500);
                });
                
                return;
            }

            $('#cont-progress').show();

            for (let c = 0; c < localStorage.length; c++) {

                var k = localStorage.key(c)
                var value = localStorage.getItem(k)
                let arr = value.split('|');
                if (arr[0] != '') {
                    cambios = cambios + arr.length
                }
            }

            prog = 100/cambios;


            for (let i = 0; i < localStorage.length; i++) {

                var k = localStorage.key(i)
                var value = localStorage.getItem(k)

                if (k.includes('com-') && value != '' && k != 'sinAsignar') {
                    result = false;

                    //console.log('compañerimso' + k.split('com-')[1])
                    let com = k.split('com-')[1]
                    let arr = value.split('|');
                    var key1 = k;
                    //console.log('cant inscripcioen:' + arr.length)
                    for (let j = 0; j < arr.length; j++) {
                        const ins = arr[j].split('ins-')[1];
                        //console.log(ins)
                        $.post(`{{ route('admin.index') }}/inscripcione_companerismos/updateInscripcione/` + ins, {
                                _token: "{{ csrf_token() }}",
                                companerismo_id: com
                            },
                            function(data, status) {
                                console.log("Data: " + data + "\nStatus: " + status);
                                
                                if(status == 'success'){
                                    result = true;
                                    progressBar();
                                     
                                    // $("#success-alert").show();
                                    // $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                                    //     $("#success-alert").slideUp(500);
                                    // });
                                }
                            }
                        );
                    }
                }

                if (k == 'cordis' && value != '') {
                   // console.log('cordis')
                    result = false

                    let arr = value.split('|');
                    //console.log('cant inscripcioen:' + arr.length)
                    var key2 = k;
                    for (let j = 0; j < arr.length; j++) {
                        const ins = arr[j].split('ins-')[1];
                       // console.log(ins)
                        $.post(`{{ route('admin.index') }}/inscripcione_companerismos/updateInscripcione/` + ins, {
                                _token: "{{ csrf_token() }}",
                                cordis: 'cord'
                            },
                            function(data, status) {
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(status == 'success'){
                                    result = true;
                                    progressBar();
                                    // $("#success-alert").show();
                                    // $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                                    //     $("#success-alert").slideUp(500);
                                    // });
                                }
                            }
                        );
                    }
                }

                if (k.includes('grupo-') && value != '') {
                    result = false;
                   // console.log('grupo' + k.split('grupo-')[1])
                    let grupo = k.split('grupo-')[1]
                    let arr = value.split('|');
                    var key3 = k;
                    //console.log('cant compañerismos:' + arr.length)
                    for (let j = 0; j < arr.length; j++) {
                        const comp = arr[j].split('com-')[1];
                        //console.log(comp)

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
                                if(status == 'success'){

                                    result = true;
                                    progressBar();
                                    // $("#success-alert").show();
                                    // $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                                    //     $("#success-alert").slideUp(500);
                                    // });
                                }
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

        var prog_actual = 0;

        function progressBar(){
            solucionados = solucionados+1
            prog_actual = (prog_actual + prog);
            $("#progress").css('width', prog_actual+"%");
            $("#progress").attr('aria-valuenow', prog_actual)
            $("#progress").html( Math.round(prog_actual*100)/100 +'%')

            if (Math.round(prog_actual) == 100 && cambios ==solucionados ) {
                
                $("#success-alert").show();
                $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                    $("#success-alert").slideUp(500);
                });
                $('#cont-progress').fadeTo(1000, 500).slideUp(500, function() {
                    $("#cont-progress").slideUp(500);
                });
                localStorage.clear();
                prog = 0
                cambios = 0
                prog_actual = 0
                $('#guardar').attr('disabled', '')
            }
        }
</script>
@stop
