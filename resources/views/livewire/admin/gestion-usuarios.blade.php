@section('title', 'Gestión de usuarios')

<div class="overflow-hidden shadow-xl rounded-lg ">
    <div class="md:w-11/12 mt-10 flex justify-between items-center gap-5 pb-5">
        <a href="javascript:history.back()" class="hidden md:flex flex-col gap-5 items-center justify-center">
            <div class="w-12 ml-10 bg-blue-950 h-12 rounded-full flex justify-center items-center">
                <div class="text-xl">
                    <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                </div>
            </div>
        </a>
        <h1 class="text-4xl font-bold text-center flex-grow">Gestión de usuarios</h1>
        <div></div> <!-- Este div vacío ayuda a mantener el botón de retroceso a la izquierda -->
    </div>
    <div class="pt-5 px-5 md:flex gap-10 hidden bg-slate-50">
        <div class="flex items-center">
            <span>Mostrar</span>
            <select wire:model="cant"
                class="mx-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>entradas</span>
        </div>
        <x-input wire:model="search" placeholder="Buscar por nombre o correo" class="w-full p-2">
        </x-input>
        <x-secondary-button>Buscar</x-secondary-button>
    </div>
    <div class="md:hidden px-2 flex items-center gap-5 py-2">
        <x-input wire:model="search" placeholder="Buscar por nombre o correo" class="w-full p-2">
        </x-input>
        <x-secondary-button>Buscar</x-secondary-button>
    </div>
    @if ($usuarios->count())
        <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium bg-slate-50">
                <tr>
                    <th scope="col" class="px-5 py-4">Nombre</th>
                    <th scope="col" class="px-5 py-4">Email</th>
                    <th scope="col" class="px-5 py-4">Teléfono</th>
                    <th scope="col" class="px-5 py-4">Institución</th>
                    <th scope="col" class="px-5 py-4">Area</th>
                    <th scope="col" class="px-5 py-4">Rol</th>
                    <th scope="col" class="px-5 py-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $item)
                    <tr class="border-b  bg-white">
                        <td class=" px-5 py-4">{{ $item->nombre }} {{ $item->apellidos }}</td>
                        <td class=" px-5 py-4">{{ $item->correo }}</td>
                        <td class=" px-5 py-4">{{ $item->telefono }}</td>
                        <td class=" px-5 py-4">{{ $item->insNombre }}</td>
                        <td class=" px-5 py-4">{{ $item->area }}</td>
                        <td class="px-5 py-4 capitalize-first max-w-xs">
                            @if ($item->tipou === 'L')
                                Administrador
                            @elseif($item->tipou === 'A')
                                Académico
                            @elseif($item->tipou === 'E')
                                Estudiante
                            @endif

                        </td>
                        <td class="px-5 py-4">
                            <x-danger-button type="button" wire:click="$emit('delete', {{ $item->idUsuario }})">
                                Eliminar
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table class="min-w-full md:hidden text-left text-sm font-light">
            <thead class="border-b font-medium bg-slate-50">
                <tr>
                    <th scope="col" class="px-5 py-4">Nombre</th>

                    <th scope="col" class="px-5 py-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $item)
                    <tr class="border-b  bg-white">
                        <td class=" px-5 py-4">{{ $item->nombre }} {{ $item->apellidos }}</td>
                        <td class="px-5 py-4">
                            <x-danger-button type="button" wire:click="$emit('delete', {{ $item->idUsuario }})">
                                Eliminar
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="p-5">No existe ningún registro coincidente.</div>
    @endif


    @if ($usuarios->hasPages())
        <div class="p-5">
            {{ $usuarios->links() }}
        </div>
    @endif

    @push('js')
        <script>
            Livewire.on('delete', idUsuario => {

                Swal.fire({
                    title: '¿Estás seguro de que deseas eliminar a este usuario?',
                    text: "Los cambios no se pueden revertir.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#172554',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('borrar', idUsuario)
                        Swal.fire({
                            title: 'Eliminado.',
                            text: "El usuario se ha eliminado correctamente",
                            icon: 'success',
                        })
                    }
                })
            })
        </script>
    @endpush
</div>
