<div>
    <x-dialog-modal maxWidth="xl" wire:model="modal" class="flex items-center justify-center">
        <x-slot name="title">Editar tesis</x-slot>
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
            <div class="flex justify-between">
                <div class="mt-4">
                    <x-label for="autorNombre" value="Nombre del autor" />
                    <x-input id="autorNombre" class="block mt-1 w-full" type="text" wire:model.defer="autorNombre"
                        name="autorNombre" required />
                    @error('autorNombre')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-label for="autorApellidos" value="Apellido del autor" />
                    <x-input id="autorApellidos" class="block mt-1 w-full" type="text"
                        wire:model.defer="autorApellido" name="autorApellidos" required />
                    @error('autorApellidos')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
            </div>
            <div class="mt-4">
                <x-label for="asesor" value="Asesor" />
                <x-input id="asesor" class="block mt-1 w-full" type="text" wire:model.defer="asesor"
                    name="asesor" required />
                @error('asesor')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="año" value="Año de realización" />
                <x-input id="año" class="block mt-1 w-full" type="text" wire:model.defer="año"
                    name="año" required />
                @error('año')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="nivel" value="Nivel" />
                <select
                    class="border-gray-300 w-full mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    name="nivel" wire:model="nivel">
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Maestria">Maestría</option>
                    <option value="Doctorado">Doctorado</option>
                </select>
                @error('nivel')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="departamento" value="Departamento" />
                <x-input id="departamento" class="block mt-1 w-full" type="text" wire:model.defer="departamento"
                    name="departamento" required />
                @error('departamento')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer" class="gap-5">
            <button
                class="inline-flex items-center px-4 py-2 bg-blue-950 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'"
                wire:click="editarTesis()">Editar</button>
            <x-secondary-button wire:click="cerrarModal">Cancelar</x-secondary-button>
        </x-slot>
    </x-dialog-modal>

</div>
