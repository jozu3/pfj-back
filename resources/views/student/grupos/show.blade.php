<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ $inscripcione->grupo->pfj->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Asistencias
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Promedio
                              </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($personale_unidades as $personale_unidade)
                              <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="ml-4">
                                      <div class="text-2xl font-medium text-gray-900">
                                        <b>{{ $personale_unidade->unidad->descripcion }}</b>
                                      </div>
                                      <div class="text-sm text-gray-500">
                                        {{ date('d/m/Y', strtotime($personale_unidade->unidad->fechainicio)) }}
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <span class="px-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                      {{ $inscripcione->asistenciasUnidad($personale_unidade->unidad)->count() }} - {{ $personale_unidade->unidad->clases->count() }}
                                  </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm">
                                    <div class="flex items-center justify-center">
                                      <div class="rounded-md bg-yellow-400 text-white font-semibold py-2 px-4">
                                        {{ $personale_unidade->nota }}
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="px-6 py-4" colspan="100%">
                                  <b>Comentario del docente:</b> 
                                  @if ($personale_unidade->comentario == '')
                                    <i class="text-gray-300">No hay comentario del docente.</i>
                                  @else
                                  {{ $personale_unidade->comentario }}
                                  @endif
                                </td>
                              </tr>                                  
                              <tr>
                                <td class="px-6 whitespace-nowrap">
                                      <div class="ml-12">
                                        <div class="text-xl text-gray-900">
                                          Notas
                                      </div>
                                </td>
                                <td colspan="2" class="px-6 py-4 whitespace-nowrap">
                                  @foreach ($personale_unidade->personaleNotasorden('asc') as $personale_nota)
                                  <div class="">
                                      <div class="flex my-2">
                                        <div class="flex-1 flex items-center">
                                          {{ $personale_nota->descripcionnota }}
                                          @if ($personale_nota->tiponota == 1)
                                            (Nota recuperatoria)
                                          @endif
                                        </div>
                                        @if ($personale_nota->valorpersonale_nota != '')
                                        <div class="flex-1 flex items-center justify-center ">
                                          <div class="rounded-md bg-yellow-600 text-white font-semibold py-2 px-4">
                                            {{ $personale_nota->valorpersonale_nota }}
                                          </div>
                                        </div>
                                        @endif
                                      </div>
                                  </div>
                                  @endforeach
                                </td>
                              </tr>
                            @empty
                              <tr>
                                <td class="px-6 py-4 text-gray-300" colspan="100%">
                                  Aun no empiezan las clases
                                </td>
                              </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

            </div>

            </div>
        </div>
    </div>
</x-app-layout>
