<x-app-layout>
    <x-slot name="header"></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-3xl">Mis lecturas</h1>
                    <div class="border-2 grid grid-cols-4 text-center">
                        <div class=""> 80 / 100%</div>
                    </div>
                    <div class="grid grid-cols-6 my-4 mx-2">
                        {{ $programa->nombre }}
                        @foreach ($programa->tareas->sortByDesc('fecha') as $tarea)
                            <div class="col-span-3 lg:col-span-1 border-3 bg-yellow-100 p-2 m-1">
                                <div class="h-8">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-yellow-600 checked:border-yellow-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"
                                            type="checkbox" value="" id="flexCheckChecked3"
                                            style="color: #ed9934;"> 
                                            {{-- only checked --}}
                                    </div>
                                </div>
                                <div class="text-2xl text-center p-2 italic font-bold pb-4">{{$tarea->descripcion}}</div>
                                <div class="text-sm">Leído: 02/02/2022</div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
