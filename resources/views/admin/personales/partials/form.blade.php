<div class="form-group">
    {!! Form::label('nombres', 'Nombre:') !!}
    {!! Form::text('nombres', $personale->contacto->nombres, ['class' => 'form-control']) !!}
</div>
@error('nombres')
    <small class="text-danger">{{ trans($message) }}</small>
@enderror
<div class="form-group">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', $personale->contacto->apellidos, ['class' => 'form-control']) !!}
</div>
@error('apellidos')
    <small class="text-danger">{{ $message }}</small>
@enderror
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', $personale->contacto->telefono, ['class' => 'form-control']) !!}
</div>
@error('telefono')
    <small class="text-danger">{{ $message }}</small>
@enderror