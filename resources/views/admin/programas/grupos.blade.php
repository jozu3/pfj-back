@extends('adminlte::page')

@section('title', 'Grupos ')

@section('content_header')
    <h1>Lista de Grupos por Sesión</h1>
@stop

@section('content')
	@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @forelse (auth()->user()->personale->inscripciones as $inscripcione)
        @livewire('admin.programas-grupos', ['programa' => $inscripcione->programa])
    @empty
        {{ 'No estás inscrito en ninguna sesión' }}
    @endforelse

@stop

@section('css')
    <style type="text/css">
        .card-body {
            overflow: auto;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop