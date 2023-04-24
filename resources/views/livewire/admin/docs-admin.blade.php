<div class="p-5 flex justify-center items-center md:h-[70vh]">
    <div class="rounded-lg bg-white shadow-lg p-5">
        <div class=" grid grid-cols-1 md:flex justify-center pt-5 flex-col gap-10 w-full items-center">
            <h1 class="text-2xl md:text-4xl font-bold">Bienvenido al panel de administración de los archivos del REPOMICH
            </h1>
            <div class="grid md:flex justify-around w-full gap-20">
                <div>
                    <div class="flex flex-wrap gap-10 pt-10 justify-center items-center">
                        <a wire:click="abrirModalConsultar">
                            <div class="flex flex-col gap-5 items-center justify-center">
                                <div class="w-32 bg-blue-950 h-32 rounded-full flex justify-center items-center">
                                    <div class="text-5xl">
                                        <i class="fa-solid fa-eye" style="color: #ffffff;"></i>
                                    </div>
                                </div>
                                <h1 class="text-2xl text-center">Consultar documentos</h1>
                            </div>
                        </a>

                    </div>
                </div>
                <div>
                    <div class="flex flex-wrap gap-10 pt-10 justify-center items-center">
                        <a wire:click="abrirModalSubir">
                            <div class="flex flex-col gap-5 items-center justify-center">
                                <div class="w-32 bg-blue-950 h-32 rounded-full flex justify-center items-center">
                                    <div class="text-5xl">
                                        <i class="fa-solid fa-cloud-arrow-up" style="color: #ffffff;"></i>
                                    </div>
                                </div>
                                <h1 class="text-2xl text-center">Subir documentos</h1>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($modal)
        @include('livewire.admin.modalSubir')
    @endif
</div>
