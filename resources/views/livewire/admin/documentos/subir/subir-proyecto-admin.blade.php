@section('title', 'Subir proyecto')

<div class="md:px-60 md:py-10">
    <div class="bg-white shadow-lg p-5 rounded-lg">
        <h1 class="text-5xl font-bold text-center">Subir proyecto</h1>
        <div id="proyectos" class="pt-5">
            <div class="mt-4">
                <x-label for="titulo" value="Título" />
                <x-input id="titulo" class="block mt-1 w-full" type="text" wire:model.defer="proyectoTitulo"
                    name="titulo" required />
                @error('proyectoTitulo')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="encargado" value="Encargado" />
                <x-input id="encargado" class="block mt-1 w-full" type="text" wire:model.defer="proyectoEncargado"
                    name="encargado" required />
                @error('proyectoEncargado')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="colaboradores" value="Colaboradores" />
                <x-input id="colaboradores" class="block mt-1 w-full" type="text" wire:model.defer="colaboradores"
                    name="colaboradores" required />
                @error('colaboradores')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="flex justify-center gap-5">
                <div class="mt-4 w-full">
                    <x-label for="fechaInicio" value="fecha de inicio" />
                    <x-input id="fechaInicio" class="block mt-1 w-full" type="date"
                        wire:model.defer="proyectoFechaInicio" name="fechaInicio" required />
                    @error('proyectoFechaInicio')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
                <div class="mt-4 w-full">
                    <x-label for="fechaFin" value="fecha de término" />
                    <x-input id="fechaFin" class="block mt-1 w-full" type="date" wire:model.defer="proyectoFechaFin"
                        name="fechaFin" required />
                    @error('proyectoFechaFin')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
            </div>
            <div class="mt-4">
                <x-label for="abstract" value="Descripción" />
                <textarea id="abstract"
                    class="block my-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-32 resize-none"
                    type="text" wire:model.defer="proyectoDescripcion" name="titulo" required>
                </textarea>
                @error('proyectoDescripcion')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="abstract" value="Financiamiento" />
                <x-input id="fechaFin" class="block mt-1 w-full" type="text"
                    wire:model.defer="proyectoFinanciamiento" name="fechaFin" required />
                @error('proyectoFinanciamiento')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="flex justify-between pt-5 items-center">
                <input type="file" wire:model="doc">
                <x-secondary-button wire:click="upload()" class="mt-2">
                    Añadir
                </x-secondary-button>
            </div>
        </div>
    </div>
</div>
</div>
