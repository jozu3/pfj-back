@extends('adminlte::page')

@section('title', 'Editar programa')

@section('plugins.Sweetalert2', true)

@section('content_header')
     <a href="{{ route('admin.programas.show', $programa) }}" class="btn btn-success btn-sm float-right"><i class="fas fa-user-graduate"></i> Ver personales</a>

    <h1>Editar programa</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
	{{ session('info') }}
</div>
@endif

    @if (auth()->user()->can('admin.programas.edit'))
	<div class="card">
		<div class="card-body">
			{!! Form::model($programa, ['route' => ['admin.programas.update', $programa], 'method' => 'put']) !!}
				@include('admin.programas.partials.form')
				<br>
				<div class="form-group">
				{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
    @endif

	@if (session('info_comp'))
        <div class="alert alert-success">
            {{ session('info_comp') }}
        </div>
    @endif
	<div class="card">
		<div class="row">
			<div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-personal-tab" data-toggle="tab" href="#nav-personal"
                            role="tab" aria-controls="nav-personal" aria-selected="true">Capacitaciones</a>
                        <a class="nav-item nav-link" id="nav-comp-tab" data-toggle="tab" href="#nav-comp" role="tab"
                            aria-controls="nav-comp" aria-selected="true">Compañerismos</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                            aria-controls="nav-profile" aria-selected="false">Lecturas</a>
                    </div>
                </nav>
                <div class="tab-content overflow-auto" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-personal" role="tabpanel"
                        aria-labelledby="nav-personal-tab">
						@livewire('admin.capacitaciones-index', [ 'programa' => $programa])
                    </div>
                    <div class="tab-pane fade show" id="nav-comp" role="tabpanel" aria-labelledby="nav-comp-tab">
						@livewire('admin.grupos-index', [ 'programa' => $programa])
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						{{-- @livewire('admin.asignaciones-index', [ 'programa' => $programa]) --}}
                    </div>
                </div>
            </div>
		</div>
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
    <style>
    	.list-nota{
    		width: 20%;
    		padding: 0.15rem 1.25rem;
    		border: 0;
    	}
    	.list-nota2{
    		width: 60%;
    	}
    	.list-group-horizontal {
		    border-bottom: 1px solid #bbbbbb;
		}
    </style>
@stop

@section('js')

	@if (session('info_comp'))
        <script>
			$().ready(function() {
				$('#nav-comp-tab').click();
				
				const urlParams = new URLSearchParams(window.location.search);
				const grupo_id = urlParams.get('grupo')
				$('#comps-' + grupo_id ).click();

			})

		</script>
    @endif
	@if (session('info_grupo'))
        <script>
			$().ready(function() {
				$('#nav-comp-tab').click();
			})

		</script>
    @endif
    <script>
    	$().ready(function() {
		
	    	$('.crear_notas_clases').submit( function (e) {
	    		e.preventDefault();
		    	Swal.fire({
				  title: 'Advertencia',
				  text: "Si crea las clases o genera las notas para los personales, ya no podrá agregar unidades o notas de las unidades a este grupo.",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Continuar',
				  cancelButtonText: "Cancelar", 
				}).then((result) => {
				  if (result.value) {
				    /**/
				    this.submit();
				  }
				})	    		
	    	});
	    

	    });
    </script>
@stop