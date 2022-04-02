@extends('adminlte::page')

@section('title', 'Crear programa')

@section('content_header')
    <h1>Crear nueva sesión</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			{!! Form::open(['route' => 'admin.programas.store']) !!}
				
				@include('admin.programas.partials.form')
				
				<br>
				<div class="form-group">
					
				{!! Form::submit('Crear programa', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop