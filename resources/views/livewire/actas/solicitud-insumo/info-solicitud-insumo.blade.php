<main class="flex flex-col items-center justify-center py-8">
    <!-- Contenedor del acta -->
    <div class="border-2 border-gray-200 rounded-lg p-4 bg-white">
        <article id="formulario-captura"
            class="relative bg-white p-8 rounded-lg max-w-3xl w-full space-y-4 print-section text-black">

            <!-- Logo superior izquierdo -->
            <img src="/img/LOGO1.png" class="absol ute top-4 left-0 h-14 w-40 m-4" alt="Logo izquierdo">

            <!-- Logo superior derecho -->
            <img src="/img/LOGO2.png" class="absolute top-4 right-0 h-14 w-40 m-4" alt="Logo derecho">

            <!-- Título del acta -->
            <div class="flex flex-col">
                <h2 class="text-2xl font-bold text-center mb-2 text-gray-800">Solicitud de Insumos</h2>
                <h3 class="text-xl font-semibold text-center mb-0 text-gray-600">Centro de Atención Cáritas</h3>
                <h4 class="text-lg text-center mb-0 text-gray-500">Mons. Guido Charbonneau</h4>
            </div>
            <p>
                Yo, <strong><u>{{ $nombre }}</u></strong>,
                con número de identidad <strong><u>{{ $identificacion }}</u></strong>,
                por medio de la presente, solicito los siguientes articulos detallados a continuación para su uso en las
                actividades correspondientes para el correcto
                funcionamiento y el cuidado del centro de atención.
            </p>

            <table class="table table-xs">

                <thead class="text-gray-800 text-sm">
                    <th class="border-b border-gray-300">
                        #
                    </th>
                    <th class="border-b border-gray-300">
                        Código
                    </th>
                    <th class="border-b border-gray-300">
                        Artículo
                    </th>
                    <th class="border-b border-gray-300">
                        Cantidad
                    </th>

                </thead>
                <tbody>
                    @foreach ($articulos as $insumo)
                        <tr class="h-12 border-b border-gray-300">
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                @if ($insumo->codigo_barra)
                                    <img class="h-4 w-40" src="data:image/png;base64, {{ $insumo->codigoBarrasPNG }}"
                                        alt="Código de Barras">

                                    <p>
                                        {{ $insumo->codigo_barra }}
                                    </p>
                                @else
                                    <p>
                                        -----
                                    </p>
                                @endif
                            </td>
                            <td>
                                {{ $insumo->nombre }}
                            </td>
                            <td>
                                {{ $insumo->cantidadEntregada }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Footer -->
            <footer class="flex flex-col text-center">
                <p>
                    Se requiere la aprobación del administrador mediante la siguiente firma a los
                    <br>
                    <strong><u> {{ $day }} </u></strong> días del mes de
                    <strong><u>{{ $month }}</u></strong> de
                    <strong><u>{{ $year }}</u></strong>
                </p>

                {{-- Firmas --}}
                <section class="flex mt-20">
                    <div class="w-full flex flex-col items-center justify-center">
                        <hr class="w-2/3 border-gray-600">
                        Firma de Aprobación
                    </div>
                </section>

            </footer>
        </article>
    </div>
    <!-- Botón de imprimir -->
    <div class="flex justify-end mt-4">
        <button onclick="window.print()" class="btn btn-primary text-primary-content border-none print-button">
            Imprimir
        </button>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;600;700&display=swap');

        /* Configuración para usar la tipografía Figtree */
        body {
            font-family: 'Figtree', sans-serif;
        }

        /* Estilos para imprimir solo la sección deseada */
        @media print {

            /* Oculta todo menos la sección que queremos imprimir */
            body * {
                visibility: hidden;
            }

            .print-section,
            .print-section * {
                visibility: visible;
            }

            /* Mueve la sección de impresión al inicio de la página en el modo de impresión */
            .print-section {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
        }
    </style>
</main>