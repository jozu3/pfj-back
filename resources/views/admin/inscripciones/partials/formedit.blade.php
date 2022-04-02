<div class="form-group">
	{{-- <div>
	{!! Form::label('', 'Tipo de matrícula') !!}
	@php 
		$personale_nuevo = false;
		$personale_antiguo = false;
	@endphp
	@if(isset($personale_existe))
		@php
			$personale_antiguo = true;
		@endphp
		<div class="text-warning">{{ $personale_existe }}</div>
	@endif
	</div>
	<div class="form-check">
		@if (isset($inscripcione)) 
			@if ($inscripcione->tipoinscripcione == 0)
			@php
				$personale_nuevo = true;
			@endphp
			@endif
			@if ($inscripcione->tipoinscripcione == 1 || isset($personale_existe))
			@php
				$personale_antiguo = true;
			@endphp
			@endif
		@endif
	{!! Form::radio('tipoinscripcione', 0, $personale_nuevo, ['class' => 'form-check-input', 'id' =>'tm1']) !!} 
	{!! Form::label('tm1', 'Personale nuevo', ['class' => 'form-check-label']) !!}
	</div>
	<div class="form-check">
	{!! Form::radio('tipoinscripcione', 1, $personale_antiguo, ['class' => 'form-check-input', 'id' =>'tm2']) !!} 
	{!! Form::label('tm2', 'Personale antiguo', ['class' => 'form-check-label']) !!}
	</div>
	@error('tipoinscripcione')
		<small class="text-danger">{{ $message }}</small>
	@enderror --}}
	
	@error('personale_id')
		<small class="text-danger">{{ $message }}</small>
	@enderror
	<div>
	@if(session('haypagos'))
		<small class="text-danger">{{ session('haypagos') }}</small>
	@endif
	</div>
</div> 