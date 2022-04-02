@extends('adminlte::page')

@section('title', 'Inyawa')

@section('content_header')
    <h1>Editar personal</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
    	<dic class="card-body">
    		{!! Form::model($personal, ['route' => ['admin.personales.update', $personal], 'method' => 'put']) !!}

    			@include('admin.personales.partials.form')
                
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    		{!! Form::close() !!}
    	</dic>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop