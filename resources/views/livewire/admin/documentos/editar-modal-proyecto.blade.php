<div>
    <x-dialog-modal maxWidth="xl" wire:model="modal" class="flex items-center justify-center">
        <x-slot name="title">Editar proyecto</x-slot>
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
            <p class="mt-4 text-xl">Participantes</p>
            <hr class="border-1 mb-3 mt-2 border-gray-900">

            @for ($i = 0; $i < count($encargadoNombre); $i++)
                <div class="flex gap-5">
                    <div class="mt-1 w-full">
                        <x-label for="encargadoNombre" value="Nombre del participante" />
                        <x-input id="encargadoNombre" class="block w-full" type="text"
                            wire:model.defer="encargadoNombre.{{ $i }}" name="encargadoNombre" required />
                        @error('encargadoNombre')
                            <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                        @enderror
                    </div>
                    <div class="mt-1 w-full">
                        <x-label for="encargadoApellidos" value="Apellido del participante" />
                        <x-input id="encargadoApellidos" class="block mt-1 w-full" type="text"
                            wire:model.defer="encargadoApellido.{{ $i }}" name="encargadoApellidos"
                            required />
                        @error('encargadoApellidos')
                            <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                        @enderror
                    </div>
                </div>
            @endfor
            <hr class="border-1 mt-3 border-gray-900">
            @if ($estadoFinanciamiento === 1)
                <div class="flex justify-center gap-5">
                    <div class="mt-4 w-full">
                        <x-label for="estadoFinanciamiento" value="Estado de financiamiento" />
                        <x-input id="estadoFinanciamiento" class="block mt-1 w-full text-sm" type="text"
                            value="El proyecto se encuentra financiado" name="estadoFinanciamiento" disabled />
                        @error('estadoFinanciamiento')
                            <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                        @enderror
                    </div>
            @endif

            <div class="mt-4 w-full">
                <x-label for="Financiamiento" value="Financiamiento" />
                <x-input id="Financiamiento" class="block mt-1 w-full" type="text" wire:model.defer="financiamiento"
                    name="Financiamiento" required />
                @error('Financiamiento')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
</div>
<div class="flex justify-center gap-5">

    <div class="mt-4 w-full">
        <x-label for="fechaInicio" value="Fecha de inicio" />
        <x-input id="fechaInicio" class="block mt-1 w-full" type="date" wire:model.defer="fechaInicio"
            name="fechaInicio" required />
        @error('fechaInicio')
            <span class="text-red-500 text-sm">El campo es obligatorio.</span>
        @enderror
    </div>
    <div class="mt-4 w-full">
        <x-label for="fechaFin" value="Fecha de término" />
        <x-input id="fechaFin" class="block mt-1 w-full" type="date" wire:model.defer="fechaFin" name="fechaFin"
            required />
        @error('fechaFin')
            <span class="text-red-500 text-sm">El campo es obligatorio.</span>
        @enderror
    </div>
</div>

</x-slot>
<x-slot name="footer" class="gap-5">
    <button
        class="inline-flex items-center px-4 py-2 bg-blue-950 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'"
        wire:click="editarProyecto()">Editar</button>
    <x-secondary-button wire:click="cerrarModal">Cancelar</x-secondary-button>
</x-slot>
</x-dialog-modal>

</div>
