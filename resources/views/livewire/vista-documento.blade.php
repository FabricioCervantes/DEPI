@section('title', 'Vista de documento')

<div class="grid md:grid-cols-2 md:h-[90vh] gap-5 p-5">
    <div class="flex flex-col gap-5 bg-white p-5 rounded-md w-80 sm:w-full justify-around divide-gray-800">
        @if ($tipo === '1')
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
                <p class="truncate ... max-w-2xl">
                    {{ $documento[0]->abstract }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Fecha</h1>
                <p>
                    {{ $documento[0]->fecha }}
                </p>
            </div>
        @elseif ($tipo === '2')
            <div class="">
                <h1 class="text-2xl">Título</h1>
                <p>
                    {{ $documento[0]->titulo }}
                </p>
            </div>
            <div class="">
                <h1 class="text-2xl">Autor</h1>
                <p>
                    {{ $documento[0]->autorNombre }}
                    {{ $documento[0]->autorApellido }}
                </p>
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
                <p class="truncate ... max-w-2xl">
                    {{ $documento[0]->abstract }}
                </p>
            </div>
            <div>
                <h1 class="text-2xl">Fecha</h1>
                <p>
                    {{ $documento[0]->fecha }}
                </p>
            </div>
        @elseif ($tipo === '3')
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
    <div class="hidden md:flex justify-center w-full">
        <iframe class="w-full" src="{{ asset('/storage/docs/' . $documento[0]->url) }}" frameborder="0"></iframe>
    </div>

    <a href="{{ asset('/storage/docs/' . $documento[0]->url) }}" download
        class="p-5 bg-blue-950 text-white transition transform  duration-300 rounded-lg hover:bg-blue-900 md:hidden text-center">Ver
        PDF</a>
</div>
