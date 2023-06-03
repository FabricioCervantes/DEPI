<div>
    <x-dialog-modal maxWidth="xl" wire:model="modal" class="flex items-center justify-center">
        <x-slot name="title">Editar artículo</x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-label for="titulo" value="Título" />
                <textarea id="titulo"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm resize-none"
                    type="text" wire:model.defer="titulo" name="titulo" required>
                </textarea>

                @error('titulo')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            @for ($i = 0; $i < count($autorNombre); $i++)
                <div class="flex gap-5">
                    <div class="mt-4 w-full">
                        <x-label for="autorNombre" value="Nombre del autor" />
                        <x-input id="autorNombre" class="block w-full" type="text"
                            wire:model.defer="autorNombre.{{ $i }}" name="autorNombre" required />
                        @error('autorNombre')
                            <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                        @enderror
                    </div>
                    <div class="mt-4 w-full">
                        <x-label for="autorApellidos" value="Apellido del autor" />
                        <x-input id="autorApellidos" class="block mt-1 w-full" type="text"
                            wire:model.defer="autorApellido.{{ $i }}" name="autorApellidos" required />
                        @error('autorApellidos')
                            <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                        @enderror
                    </div>
                </div>
            @endfor

            <div class="mt-4">
                <x-label for="Revista" value="Revista" />
                <x-input id="Revista" class="block mt-1 w-full" type="text" wire:model.defer="revista"
                    name="Revista" required />
                @error('Revista')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="fecha" value="Fecha de realización" />
                <x-input id="fecha" class="block mt-1 w-full" type="date" wire:model.defer="fecha"
                    name="fecha" required />
                @error('fecha')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="Volumen" value="Volumen" />
                <x-input id="Volumen" class="block mt-1 w-full" type="text" wire:model.defer="volumen"
                    name="Volumen" required />
                @error('Volumen')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="Volumen" value="Prueba Doc" />
                @for ($i = 0; $i < count($autorNombre); $i++)
                    <div class="flex gap-5">
                        <div class="mt-4 w-full">
                            <x-label for="autorApellidos" value="iD del autor" />
                            {{ $idAutor[$i] }}
                        </div>
                    </div>
                @endfor
            </div>
        </x-slot>
        <x-slot name="footer" class="gap-5">
            <div class="flex justify-between w-full">
                <div>
                    <x-danger-button wire:click="delete({{ $item->idDoc }})">Eliminar
                    </x-danger-button>
                </div>
                <div>
                    <button
                        class="inline-flex items-center px-4 py-2 bg-blue-950 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'"
                        wire:click="editarArticulo()">Editar</button>
                    <x-secondary-button wire:click="cerrarModal">Cancelar</x-secondary-button>
                </div>
            </div>
        </x-slot>
    </x-dialog-modal>

</div>
