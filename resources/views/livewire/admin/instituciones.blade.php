@section('title', 'Gestión de instituciones')

<div class="md:py-5 md:px-5 flex justify-center items-center flex-col">
    <div class="w-11/12 flex justify-between items-center gap-5 pb-5">
        <a href="javascript:history.back()" class="hidden md:flex flex-col gap-5 items-center justify-center">
            <div class="w-12 bg-blue-950 h-12 rounded-full flex justify-center items-center">
                <div class="text-xl">
                    <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                </div>
            </div>
        </a>
        <h1 class="text-4xl font-bold text-center flex-grow">Gestión de instituciones</h1>
        <div></div> <!-- Este div vacío ayuda a mantener el botón de retroceso a la izquierda -->
    </div>
    <table class="text-left shadow-lg text-sm font-light md:w-11/12">
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
