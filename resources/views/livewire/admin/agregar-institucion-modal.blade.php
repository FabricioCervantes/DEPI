<div>
    <x-dialog-modal maxWidth="xl" wire:model="modalAgregar" class="flex items-center justify-center">
        <x-slot name="title">Nueva institución</x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-label for="name" value="Nombre de la institución" />
                <x-input id="name" class="block mt-1 w-full" type="text" wire:model.defer="title" name="name"
                    required />
                @error('title')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer" class="gap-5">
            <button
                class="inline-flex items-center px-4 py-2 bg-blue-950 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'"
                wire:click="añadirInstitucion">Agregar</button>
            <x-secondary-button wire:click="agregarCerrar">Cancelar</x-secondary-button>
        </x-slot>
    </x-dialog-modal>

</div>
