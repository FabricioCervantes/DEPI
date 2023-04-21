<div class="hidden md:flex flex-col items-center justify-center h-[75vh] w-full p-5">
    <div class="bg-white overflow-hidden shadow-xl p-10 sm:rounded-lg">
        <h1 class="text-5xl text-center font-bold mb-10">¿Tienes alguna duda?</h1>
        <form class="w-full max-w-lg">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Nombre
                    </label>
                    <input
                        class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Ingrese su nombre">
                    {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Apellidos
                    </label>
                    <input
                        class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Ingrese su apellido">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Correo
                    </label>
                    <input
                        class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Ingrese su correo">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Duda
                    </label>
                    <select
                        class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="" id="">
                        <option value=""></option>
                        <option value="">Duda sobre un artículo/tesis/proyecto</option>
                        <option value="">Sugerencia</option>
                        <option value="">Solicitar información</option>
                        <option value="">Otro</option>
                    </select>
                </div>

            </div>
            <div class="-mx-3 mb-6">
                <div class="px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Mensaje
                    </label>
                    <textarea
                        class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="flex justify-end">
                <x-secondary-button>Enviar

                </x-secondary-button>
            </div>
        </form>
    </div>

</div>
<div class="md:hidden h-screen p-5">
    <div class="bg-white w-full shadow-lg rounded p-5 h-5/6">
        <h1 class="text-3xl font-bold text-center">¿Tienes alguna duda?</h1>
        <form class="pt-5" action="">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Nombre
                </label>
                <input
                    class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Ingrese su nombre">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Apellidos
                </label>
                <input
                    class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Ingrese su apellido">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Correo
                </label>
                <input
                    class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Ingrese su correo">
            </div>
            <div class="w-full md:w-1/2 mb-6 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Duda
                </label>
                <select
                    class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="" id="">
                    <option value=""></option>
                    <option value="">Duda sobre un artículo/tesis/proyecto</option>
                    <option value="">Sugerencia</option>
                    <option value="">Solicitar información</option>
                    <option value="">Otro</option>
                </select>
            </div>
            <div class="w-full mb-6 md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Mensaje
                </label>
                <textarea
                    class="appearance-none block w-full shadow-sm text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="" id="" cols="30" rows="5"></textarea>
            </div>
            <div class="flex justify-end">
                <x-secondary-button>Enviar
                </x-secondary-button>
            </div>
        </form>
    </div>
</div>
