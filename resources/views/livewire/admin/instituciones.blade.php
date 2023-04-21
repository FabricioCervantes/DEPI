<div class="md:py-5 md:px-5 flex justify-center items-center flex-col">
    <table class="text-left shadow-lg text-sm font-light md:w-11/12">
        <div class="w-full flex justify-center items-center flex-col gap-5 pb-5 ">
            <h1 class="text-4xl font-bold text-center">Gestión de instituciones</h1>
            <x-secondary-button wire:click="agregar()" class="">Agregar institución
            </x-secondary-button>
        </div>
        <thead class="border-b rounded-xl font-medium bg-slate-50">
            <tr>

                <th scope="col" class="px-5 py-4">#</th>
                <th scope="col" class="px-5 py-4">Institución</th>
                <th scope="col" class="px-5 py-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instituciones as $item)
                <tr class="border-b bg-white">
                    <td class=" px-5 py-4">{{ $item->idIns }}</td>
                    <td class=" px-5 py-4">{{ $item->nombre }}</td>
                    <td class="px-5 py-4">
                        <x-danger-button type="button" wire:click="$emit('delete', {{ $item->idIns }})">Eliminar
                        </x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($modalAgregar)
        @include('livewire.admin.agregar-institucion-modal')
    @endif

    @push('js')
        <script>
            Livewire.on('delete', idIns => {

                Swal.fire({
                    title: '¿Estás seguro de que deseas eliminar esta institución?',
                    text: "Los cambios no se pueden revertir.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#172554',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('borrar', idIns)
                        Swal.fire({
                            title: 'Eliminado.',
                            text: "La institución se ha eliminado correctamente",
                            icon: 'success',
                        })
                    }
                })
            })
        </script>
    @endpush

</div>
