<div class="md:px-60 md:py-10">
    <div class="bg-white shadow-lg p-5 rounded-lg">
        <h1 class="text-5xl font-bold text-center">Subir documento</h1>
        <div class="flex justify-center gap-5 pt-5">
            <button id="btnTesis" onclick="mostrarTesis()"
                class="btnPrincipal w-full shadow-lg p-2 rounded">Tesis</button>
            <button id="btnArticulos" onclick="mostrarArticulos()"
                class="btnSecundario md:inline-block shadow-lg p-2 w-full rounded">Artículos
            </button>
            <button id="btnProyectos" onclick="mostrarProyectos()"
                class="btnSecundario md:inline-block shadow-lg p-2 w-full rounded">Proyectos
            </button>
        </div>

        <div id="tesis" class="pt-5">
            <h1 class="text-xl text-blue-600 font-bold">Tesis</h1>
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
                <input type="file" wire:model.defer="tesis">
                <x-secondary-button wire:click="subirTesis()" class="mt-2">
                    Añadir
                </x-secondary-button>
            </div>
        </div>

        <div id="articulos" class="hidden pt-5">
            <h1 class="text-xl text-blue-600 font-bold">Artículo</h1>
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
                <input type="file" wire:model.defer="articulo">
                <x-secondary-button wire:click="subirArticulo()" class="mt-2">
                    Añadir
                </x-secondary-button>
            </div>
        </div>

        <div id="proyectos" class="hidden pt-5">
            <h1 class="text-xl text-blue-600 font-bold">Proyecto</h1>
            <div class="mt-4">
                <x-label for="titulo" value="Título" />
                <x-input id="titulo" class="block mt-1 w-full" type="text" wire:model.defer="titulo"
                    name="titulo" required />
                @error('titulo')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="encargado" value="Encargado" />
                <x-input id="encargado" class="block mt-1 w-full" type="text" wire:model.defer="encargado"
                    name="encargado" required />
                @error('encargado')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="colaboradores" value="Colaboradores" />
                <x-input id="colaboradores" class="block mt-1 w-full" type="text"
                    wire:model.defer="colaboradores" name="colaboradores" required />
                @error('colaboradores')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="flex justify-center gap-5">
                <div class="mt-4 w-full">
                    <x-label for="fechaInicio" value="fecha de inicio" />
                    <x-input id="fechaInicio" class="block mt-1 w-full" type="date"
                        wire:model.defer="fechaInicio" name="fechaInicio" required />
                    @error('fechaInicio')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
                <div class="mt-4 w-full">
                    <x-label for="fechaFin" value="fecha de término" />
                    <x-input id="fechaFin" class="block mt-1 w-full" type="date" wire:model.defer="fechaFin"
                        name="fechaFin" required />
                    @error('fechaFin')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
            </div>
            <div class="mt-4">
                <x-label for="abstract" value="Descripción" />
                <textarea id="abstract"
                    class="block my-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-32 resize-none"
                    type="text" wire:model.defer="titulo" name="titulo" required>
                </textarea>
                @error('abstract')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>
            <div class="flex justify-between pt-5 items-center">
                <input type="file" required>
                <x-secondary-button wire:click="" class="mt-2">
                    Añadir
                </x-secondary-button>
            </div>
        </div>
    </div>
</div>

<script>
    const tesis = document.getElementById("tesis");
    const articulos = document.getElementById("articulos");
    const proyectos = document.getElementById("proyectos");


    const btnTesis = document.getElementById("btnTesis")
    const btnArticulos = document.getElementById("btnArticulos")
    const btnProyectos = document.getElementById("btnProyectos")

    function mostrarTesis() {
        tesis.classList.remove('hidden');
        btnTesis.classList.add('btnPrincipal')
        btnTesis.classList.remove('btnSecundario')

        proyectos.classList.add('hidden');
        articulos.classList.add('hidden');
        btnArticulos.classList.add('btnSecundario')
        btnArticulos.classList.remove('btnPrincipal')
        btnProyectos.classList.add('btnSecundario')
        btnProyectos.classList.remove('btnPrincipal')

    }


    function mostrarArticulos() {
        articulos.classList.remove('hidden');
        btnArticulos.classList.add('btnPrincipal')
        btnArticulos.classList.remove('btnSecundario')

        proyectos.classList.add('hidden');
        tesis.classList.add('hidden');
        btnTesis.classList.add('btnSecundario')
        btnTesis.classList.remove('btnPrincipal')
        btnProyectos.classList.add('btnSecundario')
        btnProyectos.classList.remove('btnPrincipal')

    }

    function mostrarProyectos() {
        proyectos.classList.remove('hidden');
        btnProyectos.classList.add('btnPrincipal')
        btnProyectos.classList.remove('btnSecundario')

        articulos.classList.add('hidden');
        tesis.classList.add('hidden');
        btnTesis.classList.add('btnSecundario')
        btnTesis.classList.remove('btnPrincipal')
        btnArticulos.classList.add('btnSecundario')
        btnArticulos.classList.remove('btnPrincipal')

    }
</script>
