<div>
    <x-dialog-modal maxWidth="xl" wire:model="modal" class="flex items-center justify-center">
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="content">
            <div class="mt-4" autofocus>
                <div class="flex flex-wrap gap-10 pt-10 justify-center items-center">
                    <a class="" href="{{ route($tesis) }}">
                        <div class="flex flex-col gap-5 items-center justify-center">
                            <div class="w-32 bg-blue-950 h-32 rounded-full flex justify-center items-center">
                                <div class="text-5xl">
                                    <i class="fa-solid fa-book-open" style="color: #ffffff;"></i>
                                </div>
                            </div>
                            <p class="text-xl">Tesis</p>
                        </div>
                    </a>
                    <a href="{{ route($articulo) }}">
                        <div class="flex flex-col gap-5 items-center justify-center">
                            <div class="w-32 bg-blue-950 h-32 rounded-full flex justify-center items-center">
                                <div class="text-5xl">
                                    <i class="fa-solid fa-newspaper" style="color: #ffffff;"></i>
                                </div>
                            </div>
                            <p class="text-xl">Artículos</p>
                        </div>
                    </a>
                    <a href="{{ route($proyecto) }}">
                        <div class="flex flex-col gap-5 items-center justify-center">
                            <div class="w-32 bg-blue-950 h-32 rounded-full flex justify-center items-center">
                                <div class="text-5xl">
                                    <i class="fa-solid fa-people-group" style="color: #ffffff;"></i>
                                </div>
                            </div>
                            <p class="text-xl">Proyectos</p>
                        </div>
                    </a>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer" class="gap-5">
            <x-danger-button wire:click="cerrarModal">Cancelar</x-danger-button>
        </x-slot>
    </x-dialog-modal>

</div>
