@section('title', 'Artículos')

<div>
    @can('admin')
        <div class="pt-5 px-5 hidden md:flex gap-10">
            <div class="flex items-center">
                <span>Mostrar</span>
                <select wire:model="cant"
                    class="mx-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span>entradas</span>
            </div>
            <x-input wire:model="search" placeholder="Buscar por titulo o autor" class="w-full p-2">
            </x-input>
            <x-secondary-button>Buscar</x-secondary-button>
        </div>
    @endcan
    @if ($articulos->isEmpty())
        <div class="flex justify-center md:h-[60vh] h-[80vh] p-2 items-center">
            <div class="bg-white flex flex-col gap-5 rounded-md p-5">
                <h1 class="text-4xl text-center font-bold">No has subido ningún artículo</h1>
                <p class="text-xl text-center">Por favor, regrese a la página anterior o suba algun artículo.</p>
                <div class="flex justify-center gap-5">
                    <a href="{{ url()->previous() }}">
                        <x-secondary-button>Regresar</x-secondary-button>
                    </a>
                    <a href="{{ route('SubirArticuloAdmin') }}">
                        <x-button class="p-2 bg-blue-950 rounded-md text-white">Subir artículo</x-button>
                    </a>
                </div>
            </div>
        </div>
    @else
        @can('estudiante')
            <div class="flex justify-center items-center mt-5">
                <h1 class="text-4xl font-bold">Tus documentos</h1>
            </div>
        @endcan
        @can('academico')
            <div class="flex justify-center items-center mt-5">
                <h1 class="text-4xl font-bold">Tus documentos</h1>
            </div>
        @endcan
        @can('admin')
            <div class="md:hidden px-5 pt-5">
                <x-input wire:model="search" placeholder="Buscar por titulo o autor" class="w-full p-2 mb-5">
                </x-input>
            </div>
        @endcan
        <div class="grid md:grid-cols-2 p-5 gap-5">
            @foreach ($articulos as $item)
                <div class="bg-white shadow-md p-5 rounded-lg">
                    <h1 class="text-xl text-blue-600 font-bold">{{ $item->titulo }}</h1>
                    <div class="grid grid-cols-2 gap-2">
                        <p class="text-sm text-ellipsis">Autor: {{ $item->autorNombre }}</p>
                        <p class="text-sm">Revista: {{ $item->revista }}</p>
                        <p class="text-sm">Volumen: {{ $item->volumen }}</p>
                        <p class="text-sm">Fecha: {{ $item->fecha }}</p>
                    </div>
                    <div class="flex justify-end">
                        <x-secondary-button wire:click="abrirModal({{ $item->idDoc }})" class="mt-2">
                            Ver más
                        </x-secondary-button>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($modal)
            @include('livewire.admin.documentos.editar-modal-articulo')
        @endif
        @if ($articulos->hasPages())
            <div class="p-5">
                {{ $articulos->links() }}
            </div>
        @endif
    @endif
</div>
