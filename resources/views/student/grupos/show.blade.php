<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                {{-- <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-4 text-2xl">
                       <b>{{ $companerismo->personale_companerismos }}</b>
                    </div>
                </div> --}}
                <div class="px-14 py-12">
                    <div class="text-3xl text-center text-gray-900 border-b-2 font-bold mb-8">
                        <p class="text-yellow-500">Grupo: [Nombre de grupo]</p> <!-- border-b-4 -->
                    </div>

                    {{-- <div class="flex items-center justify-center h-screen bg-gray-900"> --}}
                    <div class="grid grid-cols-6 gap-4 flex items-center justify-center">
                        @foreach ($grupo->companerismos as $companerismo)
                            {{-- <div class="mb-4">
                        <h1 class="font-semibold text-gray-50">Mutual Followers</h1>
                      </div> --}}

                            <div
                                class="border-2 rounded-lg col-span-4 p-4 flex justify-center lg:col-span-2 md:col-span-3">
                                @foreach ($companerismo->inscripcioneCompanerismos as $inscripcioneCompanerismo)
                                    <div class="flex items-center justify-center flex-col rounded-lg space-y-4">
                                        <img class="rounded-full border-gray-100 shadow-sm w-24 h-24"
                                            src="{{$inscripcioneCompanerismo->inscripcione->personale->user->adminlte_image()}}" alt="user image">
                                        <h1 class="text-gray-500 font-semibold text-center">
                                            {{ $inscripcioneCompanerismo->inscripcione->personale->user->name }}</h1>
                                        {{-- <button class="px-8 py-1 border-2 border-indigo-600 bg-indigo-600 rounded-full text-gray-50 font-semibold">Follow</button> --}}
                                    </div>
                                    {{-- <div class="flex items-center justify-center flex-col p-4 rounded-lg space-y-4">
                                        <img class="rounded-full border-gray-100 shadow-sm w-24 h-24"
                                            src="https://randomuser.me/api/portraits/men/81.jpg" alt="user image">
                                        <h1 class="text-gray-500 font-semibold text-center">Derry Harris</h1>
                                          <button class="px-8 py-1 border-2 border-indigo-600 bg-indigo-600 rounded-full text-gray-50 font-semibold">Follow</button> 
                                    </div> --}}

                                    {{-- <div class="flex items-center justify-center flex-col bg-gray-700 p-4 rounded-lg w-48 space-y-4">
                          <img class="rounded-full border-gray-100 shadow-sm w-24 h-24" src="https://randomuser.me/api/portraits/women/2.jpg" alt="user image">
                         <h1 class="text-gray-50 font-semibold">Aliesha Hanson</h1>
                         <button class="px-8 py-1 border-2 border-indigo-600 bg-indigo-600 rounded-full text-gray-50 font-semibold">Follow</button>
                      </div>
                      <div class="flex items-center justify-center flex-col bg-gray-700 p-4 rounded-lg w-48 space-y-4">
                          <img class="rounded-full border-gray-100 shadow-sm w-24 h-24" src="https://randomuser.me/api/portraits/women/13.jpg" alt="user image">
                         <h1 class="text-gray-50 font-semibold">Cristina Frederick</h1>
                         <button class="px-6 py-1 border-2 border-indigo-600 rounded-full text-gray-50 font-semibold">Following</button>
                      </div> --}}
                                    {{-- <br>
                                <div>
                                    <b>{{ $companerismo->inscripcioneCompanerismo }}</b>
                                </div> --}}
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    {{-- </div> --}}



                    {{-- <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Código
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Concepto
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de vencimiento
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Monto pagado
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Monto final
                              </th>
                              <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Promedio</span>
                              </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($inscripcione->obligaciones as $obligacione)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{$obligacione->id }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{$obligacione->concepto }}
                                        </div>
                                    </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                      <div class="ml-4">
                                        <div class="text-2xl font-medium text-gray-900">
                                        </div>
                                        <div class="text-sm text-gray-500">
                                          {{ date('d/m/Y', strtotime($obligacione->fechalimite)) }}
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    @switch ($obligacione->estado)
                                        @case(0)
                                            Exonerado
                                            @break
                                        @case(1)
                                            Por pagar
                                            @break
                                        @case(2)
                                            Parcial
                                            @break
                                        @case(3)
                                            Pagado
                                            @if ($obligacione->fechapagadototal > $obligacione->fechalimite)
                                                <small class="text-red-500">({{ date('d/m/Y', strtotime($obligacione->fechapagadototal)) }})</small>
                                            @endif
                                            @break
                                    @endswitch
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $obligacione->montopagado }}
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $obligacione->montofinal }}
                                    </div>
                                  </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div> --}}

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
