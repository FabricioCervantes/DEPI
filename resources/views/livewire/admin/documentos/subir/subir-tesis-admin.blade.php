<div class="md:px-60 md:py-10">
    <div class="bg-white shadow-lg p-5 rounded-lg">
        <h1 class="text-5xl font-bold text-center">Subir tesis</h1>
        <div id="tesis" class="pt-5">
            <div class="mt-4">
                <x-label for="tesisTitulo" value="Título" />
                <x-input id="tesisTitulo" class="block mt-1 w-full" type="text" wire:model.defer="tesisTitulo"
                    name="tesisTitulo" required />
                @error('tesisTitulo')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="tesisAutores" value="Autor" />
                @error('tesisAutores')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
                <div class="">
                    <x-secondary-button>Agregar autor</x-secondary-button>
                </div>
            </div>
            <div class="mt-4">
                <x-label for="tesisAsesor" value="Asesor" />
                <x-input id="tesisAsesor" class="block mt-1 w-full" type="text" wire:model.defer="tesisAsesor"
                    name="tesisAsesor" required />
                @error('tesisAsesor')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="tesisAño" value="Año de publicación" />
                <x-input id="tesisAño" class="block mt-1 w-full" type="number" wire:model.defer="tesisAño"
                    name="tesisAño" required />
                @error('tesisAño')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="tesisNivel" value="Nivel" />
                <select
                    class="border-gray-300 w-full mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    name="tesisNivel" wire:model="tesisNivel">
                    <option value="">Seleccione una opción...</option>
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Maestria">Maestría</option>
                    <option value="Doctorado">Doctorado</option>
                </select>
                @error('tesisNivel')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="tesisDepartamento" value="Departamento" />
                <select
                    class="border-gray-300 w-full mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    name="tesisDepartamento" wire:model="tesisDepartamento">
                    <option value="">Seleccione una opción...</option>
                    <option value="Ciencias en Ingeniería Eléctrica">Ciencias en Ingeniería Eléctrica</option>
                    <option value="Ciencias en Ingeniería Eléctrónica">Ciencias en Ingeniería Electrónica</option>
                    <option value="Ciencias en Metalurgía">Ciencias en Metalurgía</option>
                    <option value="Ingeniería Administrativa">Ingeniería Administrativa</option>
                    <option value="Sistemas Computacionales">Sistemas Computacionales</option>
                    <option value="Doctorado en Cienicas de la Ingeniería">Doctorado en Cienicas de la Ingeniería
                    </option>
                </select>
                @error('tesisDepartamento')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="tesisResumen" value="Resumen/Abstract" />
                <textarea id="tesisResumen"
                    class="block my-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-32 resize-none"
                    type="text" wire:model.defer="tesisResumen" name="tesisResumen" required>
                </textarea>
                @error('tesisResumen')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="flex justify-between pt-5 items-center">
                <div class="flex gap-2 items-center">
                    <input type="file" wire:model="doc">
                    @error('doc')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
                <x-secondary-button wire:click="upload()" class="mt-2">
                    Añadir
                </x-secondary-button>
            </div>
        </div>
    </div>
</div>
