<x-app-layout>
    @section('title', 'DEPI')
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="bg-white pt-5 h-fit lg:h-[60vh]">
        <h1 class="text-4xl text-center font-bold" lang="es">Laboratorio Nacional del TECNM Para Impulsar la I+D+I en
            Ingeniería
        </h1>
        <div class="flex-wrap md:flex-nowrap my-10 flex justify-center items-center lg:gap-20">
            <img media="(max-width: 600px)" class="h-72" srcset="{{ asset('/build/assets/img/logo_tec.png') }}"
                alt="logo tec">
            <img media="(min-width: 600px)" class="h-72" srcset="{{ asset('/build/assets/img/mapa.png') }}"
                alt="mapa tec">
        </div>
    </div>
    <div>{{ Auth::id() }}</div>
    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl p-10 sm:rounded-lg">
                <div class="flex flex-wrap md:flex-nowrap justify-center gap-10">
                    <div class="relative">
                        <a href="#">
                            <img class="h-64" src="{{ asset('/build/assets/img/g1.jpg') }}" alt="estadisticas">
                            <h2
                                class="absolute text-5xl text-white  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                Estadísticas</>
                        </a>
                    </div>
                    <div class="relative">
                        <a href="#">
                            <img class="h-64" src="{{ asset('/build/assets/img/g2.jpg') }}" alt="documentos">
                            <h2
                                class="absolute text-5xl text-white  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                Documentos</h2>
                        </a>
                    </div>
                    <div class="relative">
                        <a href="">
                            <img class="h-64" src="{{ asset('/build/assets/img/g3.jpg') }}" alt="contacto">
                            <h2
                                class="absolute text-5xl text-white  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                Contacto</h2>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center ">
                    <h1 class="text-3xl pt-5" lang="en-us">Websites</h1>
                    <div class="md:flex gap-5 justify-center grid grid-cols-1">
                        <a href="https://www.tecnm.mx/" title="TECNM">
                            <img class="h-32" src="{{ asset('/build/assets/img/interes-tecnm.png') }}"
                                alt="interes-tecnm">
                        </a>
                        <a href="http://www.itmorelia.edu.mx/" title="ITMORELIA">
                            <img class="h-32" src="{{ asset('/build/assets/img/interes-pnt.png') }}"
                                alt="interes-ptn">
                        </a>
                        <a href="https://ecosistemaempresarialdemichoacan.com/"
                            title="ECOSISTEMA EMPRESARIAL MICHOACÁN">
                            <img class="h-32" src="{{ asset('/build/assets/img/interes-eco.png') }}"
                                alt="interes-eco">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-blue-950 text-white ">
        <div class="flex flex-wrap md:flex-nowrap justify-center items-center gap-20 p-5">
            <div class="flex flex-col gap-5">
                <div class="text-center flex flex-col gap-2">
                    <h3 class="font-bold text-2xl">Campus 1</h3>
                    <p class="w-96"> Avenida Tecnológico #1500, Col. Lomas de Santiaguito. Morelia, Mich.</p>
                </div>
                <div class="text-center flex flex-col gap-2">
                    <h3 class="font-bold text-2xl">Campus 2</h3>
                    <p class="w-96">Camino de la Arboleda S/N, Residencial San Jose de la Huerta, Tenencia Morelos.
                        Morelia, Mich.</p>
                </div>
                <div class="text-center flex flex-col gap-2">
                    <h3 class="font-bold text-2xl">Contacto</h3>
                    <p class="w-96">depi@morelia.tecnm.mx</p>
                </div>
            </div>
            <img class="h-64" src="{{ asset('/build/assets/img/footer-tec.jpg') }}" alt="footer-tec">
        </div>
        <p class="text-sm mt-10 text-gray-400 text-center" lang="es"> Tecnológico Nacional de México. Todos los
            Derechos
            reservados © 2023.
            Desarrollado por el
            Instituto
            Tecnológico de Morelia. </p>
    </footer>
</x-app-layout>
