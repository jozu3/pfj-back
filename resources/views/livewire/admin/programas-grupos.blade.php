<div>
	<div class="pgrupos">
		<nav class="navbar navbar-dark bg-yellow-pfj">
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nombre-sesion" href="#">{{ $programa->nombre }}</a>
			@forelse ($programa->grupos as $grupo)
		    <a class="nav-item nav-link" id="nav-home-tab{{ $grupo->id }}" data-toggle="tab" 
				href="#nav-home{{ $grupo->id }}" role="tab" aria-controls="nav-home{{ $grupo->id }}" aria-selected="">{{ 'Grupo ' . $grupo->numero }}</a>
			@empty
			
			@endforelse
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
			@forelse ($programa->grupos as $grupo)
			<div class="tab-pane fade show" id="nav-home{{ $grupo->id }}" role="tabpanel" aria-labelledby="nav-home-tab{{ $grupo->id }}">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Asignación</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Telefono</th>
							<th>Correo electrónico</th>
						</tr>
					</thead>
					<tbody>
					@forelse ($grupo->personale_grupos as $personale_grupo)
							<tr>
								<td>{{ $personale_grupo->personale->rolPrograma($grupo->programa)->name }}</td>
								<td>{{ $personale_grupo->personale->contacto->nombres }}</td>
								<td>{{ $personale_grupo->personale->contacto->apellidos }}</td>
								<td>{{ $personale_grupo->personale->contacto->telefono }}</td>
								<td>
									@if ( $personale_grupo->personale->user)
									{{ $personale_grupo->personale->user->email }}
									@else
									<a href="{{ route('admin.users.create', ['personale' => $personale_grupo->personale]) }}" class="btn btn-primary" >Crear usuario</a>
									@endif
								</td>
								<td width="10px">
									<a href="{{ route('admin.personales.edit', $personale_grupo->personale) }}" class="btn btn-primary" >Editar</a>
								</td>
							</tr>
					@empty
					<tr>
						<td colspan="100%">
							<div class="card">
								<div class="card-header text-warning">
									{{ 'No hay personal' }}
								</div>
							</div>
							
						</td>
					</tr>
					@endforelse
					</tbody>
				</table>
			</div>
			@empty
			<div class="card">
				<div class="card-header text-warning">
					{{ 'No hay grupos' }}
				</div>
			</div>
			@endforelse
			
		</div>		
	</div>
	<div class="col-md-12">
		
	</div>
</div>
