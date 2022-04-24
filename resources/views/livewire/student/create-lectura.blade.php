<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="grid grid-cols-6 my-4 mx-2">
        {{-- {{ $programa->nombre }} --}}
        @foreach ($programa->tareas->sortByDesc('fecha') as $tarea)
            <div class="col-span-3 lg:col-span-1 border-3 bg-yellow-100 p-2 m-1">
                <div class="h-8">
                    <div class="form-check">
                        @php
                            // $checkedTarea = $inscripcioneTarea->contains('tarea_id', $tarea->id)
                            // ? "checked" : "";

                            $idTarea = $tarea->id;
                            $realizado = true;

                            $checkedTarea = ($inscripcioneTarea->contains(function ($val, $key) use ($idTarea, $realizado) {
                                return $val->tarea_id == $idTarea && $val->realizado == $realizado;
                            })) ? "checked" : "";
                        @endphp                        
                        <input
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-yellow-600 checked:border-yellow-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"
                            {{ $checkedTarea }} type="checkbox" id="flexCheckChecked3" style="color: #ed9934;"
                            wire:click="realizado({{ $tarea->id }})">
                        {{-- only checked --}}
                        {{-- {{ $checkTarea }} --}}
                    </div>
                </div>
                <div class="text-2xl text-center p-2 italic font-bold pb-4">{{ $tarea->descripcion }}</div>
                {{-- <div class="text-sm">Leído: 02/02/2022</div> --}}

            </div>
        @endforeach
    </div>
    {{-- {{ $inscripcioneTarea }} --}}
</div>
