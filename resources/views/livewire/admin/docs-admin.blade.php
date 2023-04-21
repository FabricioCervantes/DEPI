<div class="p-5 flex justify-center items-center md:h-[70vh]">
    <div class="rounded-lg bg-white shadow-lg p-5">
        <div class="flex justify-center pt-5 flex-col gap-10 w-full items-center">
            <h1 class="text-4xl font-bold">Bienvenido al panel de administración de los archivos del REPOMICH</h1>
            <div class="flex justify-around w-full gap-20">
                <div>
                    <h1 class="text-2xl text-center">Consultar documentos</h1>
                    <div class="flex gap-10 pt-10 justify-center items-center">
                        <a href="{{ route('tesisAdmin') }}">
                            <div class="flex flex-col gap-5 items-center justify-center">
                                <div class="w-32 bg-blue-950 h-32 rounded-full flex justify-center items-center">
                                    <div class="text-5xl">
                                        <i class="fa-solid fa-book-open" style="color: #ffffff;"></i>
                                    </div>
                                </div>
                                <p class="text-xl">Tesis</p>
                            </div>
                        </a>
                        <a href="{{ route('articulosAdmin') }}">
                            <div class="flex flex-col gap-5 items-center justify-center">
                                <div class="w-32 bg-blue-950 h-32 rounded-full flex justify-center items-center">
                                    <div class="text-5xl">
                                        <i class="fa-solid fa-newspaper" style="color: #ffffff;"></i>
                                    </div>
                                </div>
                                <p class="text-xl">Artículos</p>
                            </div>
                        </a>
                        <a href="{{ route('proyectosAdmin') }}">
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
                <div>
                    <h1 class="text-2xl text-center">Subir documentos</h1>
                    <div class="flex gap-10 pt-10 justify-center items-center">
                        <a href="{{ route('subirTesisAdmin') }}">
                            <div class="flex flex-col gap-5 items-center justify-center">
                                <div class="w-32 bg-blue-950 h-32 rounded-full flex justify-center items-center">
                                    <div class="text-5xl">
                                        <i class="fa-solid fa-book-open" style="color: #ffffff;"></i>
                                    </div>
                                </div>
                                <p class="text-xl">Tesis</p>
                            </div>
                        </a>
                        <a href="{{ route('SubirArticuloAdmin') }}">
                            <div class="flex flex-col gap-5 items-center justify-center">
                                <div class="w-32 bg-blue-950 h-32 rounded-full flex justify-center items-center">
                                    <div class="text-5xl">
                                        <i class="fa-solid fa-newspaper" style="color: #ffffff;"></i>
                                    </div>
                                </div>
                                <p class="text-xl">Artículos</p>
                            </div>
                        </a>
                        <a href="{{ route('SubirProyectoAdmin') }}">
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
            </div>
        </div>
    </div>
</div>
</div>
</div>
