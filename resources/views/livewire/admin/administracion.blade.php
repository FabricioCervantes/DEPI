@section('title', 'Administración')
<div class="p-5 flex justify-center items-center">
    <div class="flex w-full flex-col justify-center items-center rounded">
        <h1 class="text-4xl font-bold text-center mb-5">Panel de administración</h1>
        <div class="bg-white grid sm:grid-cols-2">
            <div class="grid md:grid-cols-2 w-[100%]  p-2 items-center  rounded-md shadow-sm">
                <div class="flex justify-center items-center">
                    <h1 class="text-xl font-bold">Revisar documentos</h1>
                </div>
                <div class="grid md:grid-cols-2">
                    <div class="flex flex-col items-center">
                        <div class="flex justify-around gap-10">
                            <a href="{{ route('articulosAdmin') }}">
                                <div class="flex flex-col gap-5 items-center justify-center">
                                    <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                                        <div class="text-2xl">
                                            <i class="fa-solid fa-newspaper" style="color: #ffffff;"></i>
                                        </div>
                                    </div>
                                    <p class="text-xl">Artículos</p>
                                </div>
                            </a>
                            <a href="{{ route('tesisAdmin') }}">
                                <div class="flex flex-col gap-5 items-center justify-center">
                                    <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                                        <div class="text-2xl">
                                            <i class="fa-solid fa-newspaper" style="color: #ffffff;"></i>
                                        </div>
                                    </div>
                                    <p class="text-xl">Tesis</p>
                                </div>
                            </a>
                            <a href="{{ route('proyectosAdmin') }}">
                                <div class="flex flex-col gap-5 items-center justify-center">
                                    <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                                        <div class="text-2xl">
                                            <i class="fa-solid fa-people-group" style="color: #ffffff;"></i>
                                        </div>
                                    </div>
                                    <p class="text-xl">Proyectos</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 w-[100%] p-2 items-center  rounded-md shadow-sm">
                <div class="flex justify-center items-center">
                    <h1 class="text-xl font-bold">Subir documentos</h1>
                </div>
                <div class="grid md:grid-cols-2">
                    <div class="flex flex-col items-center">
                        <div class="flex justify-around gap-10">
                            <a href="{{ route('SubirArticuloAdmin') }}">
                                <div class="flex flex-col gap-5 items-center justify-center">
                                    <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                                        <div class="text-2xl">
                                            <i class="fa-solid fa-newspaper" style="color: #ffffff;"></i>
                                        </div>
                                    </div>
                                    <p class="text-xl">Artículos</p>
                                </div>
                            </a>
                            <a href="{{ route('subirTesisAdmin') }}">
                                <div class="flex flex-col gap-5 items-center justify-center">
                                    <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                                        <div class="text-2xl">
                                            <i class="fa-solid fa-newspaper" style="color: #ffffff;"></i>
                                        </div>
                                    </div>
                                    <p class="text-xl">Tesis</p>
                                </div>
                            </a>
                            <a href="{{ route('SubirProyectoAdmin') }}">
                                <div class="flex flex-col gap-5 items-center justify-center">
                                    <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                                        <div class="text-2xl">
                                            <i class="fa-solid fa-people-group" style="color: #ffffff;"></i>
                                        </div>
                                    </div>
                                    <p class="text-xl">Proyectos</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-5">
            <div class="w-[100%] p-2 bg-white rounded-md mt-5 shadow-sm">
                <div class="flex justify-center items-center">
                    <h1 class="text-3xl font-bold mb-2">Alumnos</h1>
                </div>
                @if ($usuarios->count())
                    <table class=" text-left text-sm font-light">
                        <thead class="border-b font-medium bg-slate-50">
                            <tr>
                                <th scope="col" class="px-5 py-4">Nombre</th>
                                <th scope="col" class="px-5 py-4">Institución</th>
                                <th scope="col" class="px-5 py-4">Area</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $item)
                                <tr class="border-b bg-white">
                                    <td class=" px-5 py-4">{{ $item->nombre }} {{ $item->apellidos }}</td>
                                    <td class=" px-5 py-4">{{ $item->insNombre }}</td>
                                    <td class=" px-5 py-4">{{ $item->area }}</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-5">No existe ningún registro coincidente.</div>
                @endif
                <div class="flex w-full justify-center">
                    <a href="{{ route('GestionUsuarios') }}"><button
                            class="rounded-md p-2 text-lg bg-blue-950 text-white mt-2">Ver lista completa de
                            alumnos</button></a>
                </div>
            </div>
            <div class="w-[100%] p-2 bg-white rounded-md mt-5 shadow-sm">
                <div class="flex justify-center items-center">
                    <h1 class="text-3xl font-bold mb-2">Instituciones</h1>
                </div>
                <table class="text-left text-lg font-light w-full">
                    <thead class="border-b rounded-xl font-medium bg-slate-50">
                        <tr>
                            <th scope="col" class="px-5 py-4">#</th>
                            <th scope="col" class="px-5 py-4">Institución</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instituciones as $item)
                            <tr class="border-b bg-white">
                                <td class=" px-5 py-5">{{ $item->idIns }}</td>
                                <td class=" px-5 py-5">{{ $item->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="flex w-full justify-center">
                    <a href="{{ route('instituciones') }}"><button
                            class="rounded-md p-2 text-lg bg-blue-950 text-white mt-2">Ver todas las
                            instituciones</button></a>
                </div>
            </div>
        </div>

    </div>
</div>
