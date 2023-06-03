@section('title', 'Subir artículo')
<div class="md:px-60 md:py-10">
    <div class="bg-white shadow-lg p-5 rounded-lg">
        <h1 class="text-5xl font-bold text-center">Subir Articulo</h1>
        <div id="articulos" class="pt-5">
            <div class="mt-4">
                <x-label for="titulo" value="Título" />
                <x-input id="titulo" class="block mt-1 w-full" type="text" wire:model.defer="articuloTitulo"
                    name="titulo" required />
                @error('articuloTitulo')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>

            <div class="mt-4" id="autorParent">
                @for ($i = 0; $i < $number; $i++)
                    <div class="flex flex-wrap md:flex-nowrap gap-10 mt-5" id="autorContainer">
                        <div class="w-full">
                            <x-label for="autores" value="Nombre del autor" />
                            <x-input class="block mt-1 w-full" type="text"
                                wire:model.defer="articuloAutorNombre.{{ $i }}" name="autores" required />
                            @error('articuloAutorNombre')
                                <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label for="autores" value="Apellido del autor" />
                            <x-input class="block mt-1 w-full" type="text"
                                wire:model.defer="articuloAutorApellido.{{ $i }}" name="autores" required />
                            @error('articuloAutorApellido')
                                <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label for="articuloAutorSexo" value="Sexo" />
                            <select
                                class="border-gray-300 w-full mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="articuloAutorSexo" wire:model.defer="articuloAutorSexo.{{ $i }}">
                                <option value="">Seleccione una opción...</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                            @error('articuloAutorSexo')
                                <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                            @enderror
                        </div>
                        <x-secondary-button wire:click="eliminar({{ $i }})">Eliminar</x-secondary-button>
                    </div>
                @endfor
            </div>
            <x-secondary-button class="mt-5" id="autorNuevo" wire:click="aumentar">Agregar autor
            </x-secondary-button>
            <div class="mt-4">
                <x-label for="revista" value="Revista" />
                <x-input id="revista" class="block mt-1 w-full" type="text" wire:model.defer="articuloRevista"
                    name="revista" required />
                @error('articuloRevista')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="volumen" value="Volumen" />
                <x-input id="volumen" class="block mt-1 w-full" type="number" wire:model.defer="articuloVolumen"
                    name="volumen" required />
                @error('articuloVolumen')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="fecha" value="Fecha de publicación" />
                <x-input id="fecha" class="block mt-1 w-full" type="date" wire:model.defer="articuloFecha"
                    name="fecha" required />
                @error('articuloFecha')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="abstract" value="Resumen/Abstract" />
                <textarea id="abstract"
                    class="block my-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-32 resize-none"
                    type="text" wire:model.defer="articuloAbstract" name="titulo" required>
                </textarea>
                @error('articuloAbstract')
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
