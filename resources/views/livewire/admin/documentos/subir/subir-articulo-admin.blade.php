<div class="md:px-60 md:py-10">
    <div class="bg-white shadow-lg p-5 rounded-lg">
        <h1 class="text-5xl font-bold text-center">Subir Articulo</h1>
        <div id="articulos" class="pt-5">
            <div class="mt-4">
                <x-label for="titulo" value="Título" />
                <x-input id="titulo" class="block mt-1 w-full" type="text" wire:model.defer="articuloTitulo"
                    name="titulo" required />
                @error('titulo')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="autores" value="Autores" />
                <x-input id="autores" class="block mt-1 w-full" type="text" wire:model.defer="articuloAutores"
                    name="autores" required />
                @error('autores')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="revista" value="Revista" />
                <x-input id="revista" class="block mt-1 w-full" type="text" wire:model.defer="articuloRevista"
                    name="revista" required />
                @error('revista')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="volumen" value="Volumen" />
                <x-input id="volumen" class="block mt-1 w-full" type="number" wire:model.defer="articuloVolumen"
                    name="volumen" required />
                @error('volumen')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="fecha" value="Fecha de publicación" />
                <x-input id="fecha" class="block mt-1 w-full" type="date" wire:model.defer="articuloFecha"
                    name="fecha" required />
                @error('fecha')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="abstract" value="Resumen/Abstract" />
                <textarea id="abstract"
                    class="block my-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-32 resize-none"
                    type="text" wire:model.defer="articuloAbstract" name="titulo" required>
                </textarea>
                @error('abstract')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="flex justify-between pt-5 items-center">
                <input type="file" wire:model="doc">
                @error('doc')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
                <x-secondary-button wire:click="upload()" class="mt-2">
                    Añadir
                </x-secondary-button>
            </div>
        </div>
    </div>
</div>
