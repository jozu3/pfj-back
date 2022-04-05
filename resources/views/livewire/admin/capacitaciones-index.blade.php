<div>
    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>Fecha</th>
    			<th>Modificar</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach ($capacitaciones as $capacitacione)
    			<tr>
    				{!! Form::model($capacitacione, ['route' => ['admin.capacitaciones.update', $capacitacione], 'method' => 'put']) !!}
    				{!! Form::hidden('unidad_id', $unidad->id) !!}
    				<td>
    					{!! Form::date('fechacapacitacione', null, ['class' => 'form-control']) !!}
    				<td>
    					{!! Form::submit('Guardar',  ['class' => 'btn btn-primary'])!!}
    				</td>
    				{!! Form::close() !!}
    			</tr>
    		@endforeach
    	</tbody>
    </table>	
</div>
