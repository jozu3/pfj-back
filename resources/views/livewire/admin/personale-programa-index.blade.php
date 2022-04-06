<div>
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
        @forelse ($personales as $personale)
                <tr>
                    <td>{{ $personale->rolPrograma($programa)->name }}</td>
                    <td>{{ $personale->contacto->nombres }}</td>
                    <td>{{ $personale->contacto->apellidos }}</td>
                    <td>{{ $personale->contacto->telefono }}</td>
                    <td>
                        @if ( $personale->user)
                        {{ $personale->user->email }}
                        @else
                        <a href="{{ route('admin.users.create', ['personale' => $personale]) }}" class="btn btn-primary" >Crear usuario</a>
                        @endif
                    </td>
                    <td width="10px">
                        <a href="{{ route('admin.personales.edit', $personale) }}" class="btn btn-primary" >Editar</a>
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
