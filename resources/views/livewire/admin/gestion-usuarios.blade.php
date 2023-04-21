<div class="overflow-hidden shadow-xl rounded-lg hidden sm:block">
    <h1 class="text-4xl font-bold text-center py-5">Gestión de usuarios</h1>
    <div class="pt-5 px-5 flex gap-10 bg-slate-50">
        <div class="flex items-center">
            <a class="mr-5" href="{{ route('administracion') }}">
                <button class="bg-blue-950 hover:bg-blue-900 rounded p-2 text-white text-sm">Regresar</button>
            </a>
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
                    <tr class="border-b bg-white">
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
