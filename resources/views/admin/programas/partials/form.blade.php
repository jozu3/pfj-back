<div class="row">
<div class="col-md-3">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control', /*'disabled' => ''*/]) !!}
	{!! Form::hidden('pfj_id', null) !!}

	@error('nombre')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 
<div class="col-md-3">
	{!! Form::label('fecha_inicio', 'Fecha de inicio') !!}
	{!! Form::date('fecha_inicio', null, ['class' => 'form-control']) !!}
	@error('fecha_inicio')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 

<div class="col-md-3">
	{!! Form::label('fecha_fin', 'Fecha de fin') !!}
	{!! Form::date('fecha_fin', null, ['class' => 'form-control']) !!}
	@error('fecha_fin')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 

<div class="col-md-3">
	{!! Form::label('estado', 'Estado') !!}
	{!! Form::select('estado', [
			'0' => 'Por iniciar',
			'1' => 'Iniciado',
			'2' => 'Terminado',
		], null, ['class' => 'form-control', 'placeholder' => '--Seleccione--']); !!}
	@error('estado')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div> 
</div> 