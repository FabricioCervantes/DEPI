<div class=" grid md:flex justify-between md:h-[90vh] gap-5  py-5 px-16 w-full">
    <div class="flex flex-col gap-5 w-full divide-y justify-center divide-gray-800">
        @if ($documento[0]->idArticulo != null)
            <div class="">
                <h1 class="text-2xl">Título</h1>
                <p>
                    {{ $documento[0]->titulo }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Autor(es)</h1>
                <p>
                    {{ $documento[0]->autorNombre }}
                    {{ $documento[0]->autorApellido }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Revista</h1>
                <p>
                    {{ $documento[0]->revista }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Volumen</h1>
                <p>
                    {{ $documento[0]->volumen }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Abstract</h1>
                <p>
                    The kinematics of the wetting front, i.e.,
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Fecha</h1>
                <p>
                    {{ $documento[0]->fecha }}
                </p>
                <hr class="border-1 mt-5 border-gray-900">
            </div>
        @elseif ($documento[0]->idTesis != null)
            <div class="">
                <h1 class="text-2xl">Título</h1>
                <x-input class="w-full p-2" value="{{ $documento[0]->titulo }}">

                </x-input>

            </div>

            <div class="">
                <h1 class="text-2xl">Asesor</h1>
                <p>
                    {{ $documento[0]->asesor }}
                </p>
            </div>

            <div>
                <h1 class="text-2xl">Nivel</h1>
                <p>
                    {{ $documento[0]->nivel }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Departamento</h1>
                <p>
                    {{ $documento[0]->departamento }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Abstract</h1>
                <p>
                    The kinematics of the wetting front, i.e.,
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Fecha</h1>
                <p>
                    {{ $documento[0]->fecha }}
                </p>
                <hr class="border-1 mt-5 border-gray-900">
            </div>
        @elseif ($documento[0]->idProyecto != null)
            <div class="">
                <h1 class="text-2xl">Título</h1>
                <p>
                    {{ $documento[0]->titulo }}
                </p>
            </div>

            <div class="">
                <h1 class="text-2xl">Descripción</h1>
                <p>
                    {{ $documento[0]->descripcion }}
                </p>
            </div>

            <div>
                <h1 class="text-2xl">Fecha inicio</h1>
                <p>
                    {{ $documento[0]->fechaInicio }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Fecha Fin</h1>
                <p>
                    {{ $documento[0]->fechaFin }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Encargado</h1>
                <p>
                    {{ $documento[0]->nombre }} {{ $documento[0]->apellidos }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Financiamiento</h1>
                <p>
                    ${{ $documento[0]->financiamiento }}
                </p>
            </div>
        @endif

    </div>
    {{-- <div class="flex justify-center w-full">
        <iframe class="w-full" src="{{ asset('/build/assets/docs/' . $documento[0]->url) }}" frameborder="0"></iframe>
    </div> --}}
</div>
