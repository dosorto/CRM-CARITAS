<div class="h-screen w-full flex flex-col bg-base-100">
    <header class="h-14 flex justify-between items-center p-4 shadow-md z-10">
        <h1 class="text-xl font-bold">Estadísticas</h1>
        {{-- <div class="hidden">
            <span class="icon-[fa6-solid--child]"></span>
            <span class="icon-[fa6-solid--child-dress]"></span>
            <span class="icon-[fa-solid--male]"></span>
            <span class="icon-[fa-solid--female]"></span>
        </div> --}}
    </header>

    <div class="flex flex-col justify-between h-full overflow-auto">
        <main class="h-full grow overflow-y-auto w-full">
            {{-- Cantidad de Migrantes en el Centro --}}
            <section class="flex gap-4 overflow-auto p-4">
                @foreach ($cantidadesMigrantes as $index => $item)
                    <div class="flex py-3 bg-base-200 w-full min-w-40 pl-5 rounded-lg shadow-md items-center">
                        <span class="icon-[{{ $item->iconClass }}] size-8"></span>
                        <div class="flex flex-col ml-3">
                            <span class="text-sm font-semibold">{{ $item->label }}:</span>
                            <span class="text-2xl font-semibold">{{ $item->cantidad }}</span>
                        </div>
                    </div>
                @endforeach
            </section>

            {{-- Gráficos --}}
            <section class="w-full flex flex-col px-4">
                {{-- <article class="w-1/3 border-2 p-4 rounded-lg h-max text-center bg-accent">

                </article> --}}
                <article class="w-full h-max bg-base-200 shadow-md px-6 py-4 rounded-lg">
                    <h3 class="font-semibold text-center mb-2">Cantidad de Migrantes por Mes</h3>
                    <x-chartjs-component :chart="$chart" />
                </article>

                <div class="flex gap-4">
                    <article class="w-2/5 bg-base-200 px-6 py-4 my-4 rounded-lg shadow-md">
                        <h3 class="font-semibold text-center mb-2">Países de origen de migrantes en el centro</h3>
                        <x-chartjs-component :chart="$chartDonut" />
                    </article>
                    <div class="w-3/5 flex flex-col py-4 gap-4">
                        <div class="flex py-3 bg-base-200 w-full min-w-40 pl-5 rounded-lg shadow-md items-center">
                            <span class="icon-[material-symbols-light--family-restroom-rounded] size-8"></span>
                            <div class="flex flex-col ml-3">
                                <span class="text-sm font-semibold">Cantidad de Grupos o Familias:</span>
                                <span class="text-2xl font-semibold">{{ $familias }}</span>
                            </div>
                        </div>
                </div>
            </section>
        </main>

        {{-- Footer fijo en la parte inferior --}}
        {{-- <footer class="h-auto flex flex-col justify-center text-base-content p-4">
        </footer> --}}
    </div>
</div>
@script
    <script>
        document.addEventListener('livewire:initialized', function() {
            // Obtener el tema inicial
            function modificarGrafico(legendColor) {
                // Obtiene la instancia del gráfico por su ID
                const chart = Chart.getChart('barChartTest');

                if (chart) {
                    // Modifica colores de las leyendas
                    chart.options.plugins.legend.labels.color =
                        legendColor; // Color verde para el texto de las leyendas

                    // Modifica colores de los labels en los ejes
                    chart.options.scales.x.ticks.color = legendColor; // Color naranja para etiquetas del eje X
                    chart.options.scales.y.ticks.color = legendColor; // Color púrpura para etiquetas del eje Y

                    // Aplica los cambios
                    chart.update();
                }
            }

            function modificarDonaPaises(legendColor) {
                // Obtiene la instancia del gráfico por su ID
                const chart = Chart.getChart('pieChartTest');

                if (chart) {
                    // Modifica colores de las leyendas
                    // Color verde para el texto de las leyendas
                    chart.options.plugins.legend.labels.color = legendColor;

                    // Aplica los cambios
                    chart.update();
                }
            }

            var theme = document.documentElement.getAttribute('data-theme') || 'light';

            // Escuchar cambios en el tema
            window.addEventListener('themeChanged', function(event) {
                console.log('Theme changed to:', event.detail.theme);
                if (event.detail.theme === 'dark') {
                    // de light a dark
                    modificarGrafico('#CCC'); // Cambia el color de las leyendas a blanco
                    modificarDonaPaises('#CCC'); // Cambia el color de las leyendas a blanco
                } else {
                    // de dark a light
                    modificarGrafico('#000'); // Cambia el color de las leyendas a blanco
                    modificarDonaPaises('#000'); // Cambia el color de las leyendas a blanco
                }
            });
        });
    </script>
@endscript
