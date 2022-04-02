<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de un personal">
    	</div>
        @if ($personales->count())
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Nombres</th>
    					<th>Apellidos</th>
                        <th>Telefono</th>
    					<th>Correo electrónico</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($personales as $personal)
    				  <tr>
                        <td>{{ $personal->contacto->nombres }}</td>
    				  	<td>{{ $personal->contacto->apellidos }}</td>
                        <td>{{ $personal->contacto->telefono }}</td>
    				  	<td>
                            @if ( $personal->user)
                            {{ $personal->user->email }}
                            @else
                            <a href="{{ route('admin.users.create', ['personal' => $personal]) }}" class="btn btn-primary" >Crear usuario</a>
                            @endif
                        </td>
    				  	<td width="10px">
    				  		<a href="{{ route('admin.personales.edit', $personal) }}" class="btn btn-primary" >Editar</a>
    				  	</td>
    				  </tr>
    				@endforeach

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $personales->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>
