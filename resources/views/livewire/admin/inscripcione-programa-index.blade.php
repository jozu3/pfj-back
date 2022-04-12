<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Asignación</th>
                <th>Grupo - Compañerismo</th>
                <th colspan="2">Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Correo electrónico</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($inscripciones as $inscripcione)
                <tr>
                    <td>{{ $inscripcione->role->name }}</td>
                    @if ($inscripcione->role->name == 'Matrimonio Director')
                        <td>{{ $inscripcione->role->name }}</td>
                    @else
                    @if ($inscripcione->role->name == 'Cordinador')
                        <td>{{ $inscripcione->role->name }}</td>
                    @else
                        @if ($inscripcione->inscripcioneCompanerismo->companerismo != null)
                            
                        <td>
                            {{  $inscripcione->inscripcioneCompanerismo->companerismo->grupo->numero . ' - ' . $inscripcione->inscripcioneCompanerismo->companerismo->numero }}
                        </td>
                        @else
                        <td> No tiene compañero(a)</td>
                        @endif
                    @endif
                    @endif
                    <td>
                        <img id="imgperfil" class="rounded-circle" width="50" src="{{ $inscripcione->personale->user->adminlte_image() }}" alt="">
                    </td>
                    <td>
                        {{ $inscripcione->personale->contacto->nombres }}
                    </td>
                    <td>{{ $inscripcione->personale->contacto->apellidos }}</td>
                    <td>{{ $inscripcione->personale->contacto->telefono }}</td>
                    <td>
                        @if ( $inscripcione->personale->user)
                        {{ $inscripcione->personale->user->email }}
                        @else
                        <a href="{{ route('admin.users.create', ['personale' => $inscripcione->personale]) }}" class="btn btn-primary" >Crear usuario</a>
                        @endif
                    </td>
                    <td width="10px">
                        <a href="{{ route('admin.inscripciones.edit', $inscripcione) }}" class="btn btn-primary" >Editar</a>
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
