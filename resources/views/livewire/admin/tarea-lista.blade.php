<div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- <div class="float-right">
            
        </div> --}}

        <ul class="todo-list ui-sortable" data-widget="todo-list">
            <li>
                <span class="handle ui-sortable-handle" style="width: 10px">&nbsp;</span>
                <span class="text" style="width: 100px">FECHA</span>
                <span class="text">LECTURA</span>
                <span class="float-right">
                    <button type="button" class="btn btn-sm btn-primary" wire:click="$toggle('addTarea')">
                        <i class="fas fa-plus-circle"></i> Añadir tarea
                    </button>
                </span>
            </li>
            @if ($addTarea)
                <li>
                    {{-- <span class="handle ui-sortable-handle" style="width: 10px">&nbsp;</span> --}}
                    <span class="text" style="width: 200px">
                        <div class="">
                            <input type="date" class="form-control form-control-sm" wire:model.defer='fecha'>
                            <x-jet-input-error class="text-danger" for="fecha" />                            
                        </div>
                    </span>
                    <span class="text w-auto">
                        <input type="text" class="form-control form-control-sm" wire:model.defer="descripcion">
                        <x-jet-input-error class="text-danger" for="descripcion" />
                    </span>
                    <div class="tools">
                        <a href="#" class="btn btn-link" wire:click='saveTarea'><i class="fas fa-save"></i>
                            Guardar</a>
                    </div>
                </li>
            @endif
            @foreach ($programa->tareas->sortByDesc('fecha')->take(5) as $tarea)
                <li>
                    <span class="handle ui-sortable-handle" style="width: 10px">
                        <i class="far fa-bookmark"></i>
                    </span>
                    <span class="text" style="width: 100px">{{ $tarea->fecha }}</span>
                    <span class="text">{{ $tarea->descripcion }}</span>
                    <div class="tools">
                        <a href=""><i class="fas fa-edit"></i></a>
                        <a href=""><i class="fas fa-trash-alt"></i></a>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{-- <button type="button" class="btn btn-sm btn-primary float-right" wire:click="$toggle('addTarea')">
            <i class="fas fa-plus-circle"></i> Añadir tarea
        </button> --}}
        {{-- @livewire('admin.create-tarea') --}}
    </div>
</div>
