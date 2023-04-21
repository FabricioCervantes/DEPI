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
        @livewire('articulos')
    </div>

</div>
