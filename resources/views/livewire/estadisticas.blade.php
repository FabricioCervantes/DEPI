@section('title', 'Estadísticas')
<div class="p-5">
    <h1 class="text-4xl md:text-5xl pt-5 text-center">
        ¡Bienvenido al panel de Estadísticas!
    </h1>
    <div class="grid mb-5 justify-center md:flex gap-10 w-full md:h-[23vh] pt-10">
        <div class="border bg-white border-gray-400 rounded-md p-5 h-36 w-80 flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <h3 class="text-2xl text-gray-500">TESIS</h3>
                <p class="text-3xl">{{ $tesis }}</p>
            </div>
            <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                <i class="fa-solid fa-book-open fa-xl" style="color: #ffffff;"></i>
            </div>
        </div>
        <div class="border bg-white border-gray-400 rounded-md p-5 h-36 w-80 flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <h3 class="text-2xl text-gray-500">ARTÍCULOS</h3>
                <p class="text-3xl">{{ $articulos }}</p>
            </div>
            <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                <i class="fa-solid fa-newspaper fa-xl" style="color: #ffffff;"></i>
            </div>
        </div>
        <div class="border bg-white border-gray-400 rounded-md p-5 h-36 w-80 flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <h3 class="text-2xl text-gray-500">PROYECTOS</h3>
                <p class="text-3xl">{{ $proyectos }}</p>
            </div>
            <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                <i class="fa-solid fa-people-group fa-xl" style="color: #ffffff;"></i>
            </div>
        </div>
        <div class="border bg-white border-gray-400 rounded-md p-5 h-36 w-80 flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <h3 class="text-2xl text-gray-500">TECNOLÓGICOS</h3>
                <p class="text-3xl">{{ $instituciones }}</p>
            </div>
            <div class="w-16 bg-blue-950 h-16 rounded-full flex justify-center items-center">
                <i class="fa-solid fa-school fa-xl" style="color: #ffffff;"></i>
            </div>
        </div>
    </div>

    <div class="w-full flex justify-center pb-5">
        <button id="btnPastel" onclick="mostrarPastel()" class="btnPrincipal w-full shadow-lg p-2 rounded">Total de
            documentos</button>
        <button id="btnBarras" onclick="mostrarBarras()"
            class="btnSecundario hidden md:inline-block shadow-lg p-2 w-full rounded">Documentos
            subidos por
            mes</button>
    </div>
    <div id="pastel"></div>
    <div id="barras" class="hidden"></div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        const pastel = document.getElementById("pastel");
        const barras = document.getElementById("barras");

        const btnPastel = document.getElementById("btnPastel")
        const btnBarras = document.getElementById("btnBarras")

        function mostrarBarras() {
            pastel.classList.add('hidden');
            barras.classList.remove('hidden');
            btnPastel.classList.add('btnSecundario')
            btnPastel.classList.remove('btnPrincipal')
            btnBarras.classList.add('btnPrincipal')
            btnBarras.classList.remove('btnSecundario')
        }

        function mostrarPastel() {
            pastel.classList.remove('hidden');
            barras.classList.add('hidden');
            btnBarras.classList.add('btnSecundario')
            btnBarras.classList.remove('btnPrincipal')
            btnPastel.classList.add('btnPrincipal')
            btnPastel.classList.remove('btnSecundario')

        }
        Highcharts.chart('pastel', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Total de Tesis, Artículos y Proyectos',
                align: 'center'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Tesis',
                    y: <?= $tesis ?>,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Artículos',
                    y: <?= $articulos ?>,
                }, {
                    name: 'Proyectos',
                    y: <?= $proyectos ?>,
                }, {
                    name: 'Tecnológicos',
                    y: <?= $instituciones ?>,
                }]
            }]
        });
        // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

        // Create the chart


        Highcharts.chart('barras', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'center',
                text: 'Documentos subidos cada mes'
            },
            subtitle: {
                align: 'left',

            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Documentos subidos'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }
            },

            tooltip: {
                // headerFormat: '<span style="font-size:11px">Artículos/tesis subidoss el mes de {series.data.name[0]}</span><br>',
                // pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [{
                name: 'Mes',
                colorByPoint: true,
                data: [{
                        name: "Enero",
                        y: <?= $subidasTotales[0] ?>,
                        drilldown: 'Enero'
                    },
                    {
                        name: "Febrero",
                        y: <?= $subidasTotales[1] ?>,
                        drilldown: 'Febrero'
                    },
                    {
                        name: "Marzo",
                        y: <?= $subidasTotales[2] ?>,
                        drilldown: 'Marzo'
                    },
                    {
                        name: "Abril",
                        y: <?= $subidasTotales[3] ?>,
                        drilldown: 'Abril'
                    },
                    {
                        name: "Mayo",
                        y: <?= $subidasTotales[4] ?>,
                        drilldown: 'Mayo'
                    },
                    {
                        name: "Junio",
                        y: <?= $subidasTotales[5] ?>,
                        drilldown: 'Junio'
                    },
                    {
                        name: "Julio",
                        y: <?= $subidasTotales[6] ?>,
                        drilldown: 'Julio'
                    },
                    {
                        name: "Agosto",
                        y: <?= $subidasTotales[7] ?>,
                        drilldown: 'Agosto'
                    },
                    {
                        name: "Septiembre",
                        y: <?= $subidasTotales[8] ?>,
                        drilldown: 'Septiembre'
                    },
                    {
                        name: "Octubre",
                        y: <?= $subidasTotales[9] ?>,
                        drilldown: 'Octubre'
                    },
                    {
                        name: "Noviembre",
                        y: <?= $subidasTotales[10] ?>,
                        drilldown: 'Noviembre'
                    },
                    {
                        name: "Diciembre",
                        y: <?= $subidasTotales[11] ?>,
                        drilldown: 'Diciembre'
                    },

                ]

            }],

        });
    </script>
</div>
