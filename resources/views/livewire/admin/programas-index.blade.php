<div>
    <div class="card">
    	<div class="card-header">
            @if (!isset($pfj_id))
            <div class="form-row align-items-center">
                <div class="col-md-10 my-1">
                    <input wire:model="search" class="form-control" placeholder="Ingrese nombre de un pfj">
                </div>
                <div class="col-md-1 my-1">
                    <div style="text-align:right; font-weight:bold">Mostrar:</div>
                </div>
                <div class="col-md-1 my-1">
                  <select class="custom-select mr-sm-2" wire:model="cant" id="inlineFormCustomSelect">
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
            @else
              <a href="{{ route('admin.programas.create', 'idcurso='.$pfj_id) }}" class="btn btn-success btn-sm float-right">Nueva sesión</a>
            @endif
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "poriniciar" type="checkbox" value="" id="poriniciar">
                    <label class="form-check-label" for="poriniciar">
                    Por iniciar
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "iniciado" type="checkbox" value="" id="iniciado">
                    <label class="form-check-label" for="iniciado">
                    Iniciado
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "terminado" type="checkbox" value="" id="terminado">
                    <label class="form-check-label" for="terminado">
                    	Terminado
                    </label>
                  </div>
                </div>
            </div>
    	</div>
        @if ($programas->count())
    	<div class="card-body overflow-auto">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>ID</th>
    					<th>Pfj</th>
    					<th>programa</th>
                        <th>Estado</th>
                        @if (!auth()->user()->hasRole('Profesor'))
                            <th>grupoes</th>
                        @else
                            <th>grupoes que enseño</th>
                        @endif
                        <th>Personales</th>
                        @can('admin.programas.edit')
    					<th colspan="2"></th>
                        @endcan
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($programas as $programa)
    				  <tr>
                        <td>{{ $programa->idprograma }}</td>
    				  	<td>{{ $programa->nombreprograma }}</td>
    				  	<td>{{ date('d/m/Y', strtotime($programa->fecha_inicio)) }}</td>
    				  	<td>{{ date('d/m/Y', strtotime($programa->fecha_fin)) }}</td>
    				  	<td>
                            @if ( $programa->estado == '0')
                                {{ 'Por iniciar' }}
                            @endif
                            @if ( $programa->estado == '1')
                                {{ 'Iniciado' }}
                            @endif
                            @if ( $programa->estado == '2')
                                {{ 'Terminado' }}
                            @endif
                        </td>
                        <td>
                            @if (auth()->user()->hasRole('Profesor'))
                                {{auth()->user()->profesore->programasqueenseño($programa->id)->count()}}
                            @else
                                {{ $programa->grupos->count() }}
                            @endif
                        </td>
                        <td>
                            {{ $programa->inscripciones->count() }}
                        </td>
                        {{-- @can('admin.programas.edit')
    				  	<td width="10px">
                            <a href="{{ route('admin.programas.edit', $programa) }}" class="btn btn-sm btn-primary" >Editar</a>
                        </td>
                        @endcan
                        @can(['admin.asistencias.create', 'admin.personale_notas.create'])
                        <td width="10px">
                            <a href="{{ route('admin.programas.show', $programa) }}" class="btn btn-sm btn-primary" >Personales</a>
                        </td>
                        @endcan
                        @can('admin.programas.destroy')
    				  	<td width="10px">
							<form method="POST" action="{{ route('admin.programas.destroy', $programa) }}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
							</form>
						</td>
                        @endcan
                        @if (auth()->user()->hasRole('Profesor') or auth()->user()->can('admin.programas.viewList'))
                            <td width="200px">
                                <a href="{{ route('admin.excel.personalesprograma', $programa) }}" class="btn btn-success btn-sm float-right mr-3"><i class="far fa-file-excel"></i> Registro de personales</a>
                            </td>
                        @endif --}}
    				  </tr>
    				@endforeach

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            {{ $programas->links() }}
        </div>
        @else
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        @endif
    </div>
</div>