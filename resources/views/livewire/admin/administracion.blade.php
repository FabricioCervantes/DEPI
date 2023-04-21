<div class="p-5 flex justify-center items-center md:h-[70vh]">
    <div class="bg-white w-full md:h-[40vh] flex flex-col justify-center items-center p-5 shadow-lg rounded">
        <h1 class="text-5xl font-bold text-center">Panel de administración</h1>
        <div class="grid mb-5 justify-center md:flex gap-10 w-full md:h-[23vh] pt-10">
            <a href="{{ route('docs') }}">
                <div class="border bg-white border-gray-400 rounded-md p-5 h-36 w-80 flex items-center justify-between">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-2xl text-gray-500">Documentos</h3>
                    </div>
                    <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                        <i class="fa-solid fa-book-open fa-xl" style="color: #ffffff;"></i>
                    </div>
                </div>
            </a>
            <a href="{{ route('GestionUsuarios') }}">
                <div class="border bg-white border-gray-400 rounded-md p-5 h-36 w-80 flex items-center justify-between">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-2xl text-gray-500">Usuarios</h3>
                    </div>
                    <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                        <i class="fa-solid fa-people-group fa-xl" style="color: #ffffff;"></i>

                    </div>
                </div>
            </a>
            <a href="{{ route('instituciones') }}">
                <div class="border bg-white border-gray-400 rounded-md p-5 h-36 w-80 flex items-center justify-between">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-2xl text-gray-500">Instituciones</h3>
                    </div>
                    <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                        <i class="fa-solid fa-school fa-xl" style="color: #ffffff;"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>
</div>
