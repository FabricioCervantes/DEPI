<div>
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
    <div class="md:hidden px-5 pt-5">
        <x-input wire:model="search" placeholder="Buscar por titulo o autor" class="w-full p-2 mb-5">
        </x-input>
    </div>
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
</div>
