<main class="flex flex-col items-center justify-center py-8">
    <!-- Contenedor de la solicitud -->
    <div class="border-2 border-gray-200 rounded-lg p-4 bg-white">
        <article id="info-solicitud-traslado"
        class="relative bg-white p-8 rounded-lg max-w-3xl w-full space-y-4 print-section text-black"">

            <!-- Logo superior izquierdo -->
            <img src="/img/logo-centro.jpg" class="absolute top-4 left-6 h-16 w-16 m-4" alt="Logo izquierdo">

            <!-- Logo superior derecho -->
            <img src="/img/LOGO2.png" class="absolute top-4 right-0 h-14 w-40 m-4" alt="Logo derecho">

            <!-- Encabezado -->
            <div class="flex flex-col">
                <h2 class="text-2xl font-bold text-center mb-2 text-gray-800">Solicitud de Traslado de Bienes</h2>
                <h3 class="text-xl font-semibold text-center mb-0 text-gray-600">Centro de Atención Cáritas</h3>
                <h4 class="text-lg text-center mb-0 text-gray-500">Mons. Guido Charbonneau</h4>
            </div>

            <!-- Información de la solicitud -->
            <p class="mt-4">
                Por medio de la presente, Yo <strong><u>{{ $nombreSolicitante }}</u></strong> solicito formalmente
                el traslado de los bienes detallados a continuación en fecha:
                <strong><u>{{ $day }} de {{ $month }} de {{ $year }}</u></strong>.
                Este traslado es necesario para el adecuado funcionamiento y provisión de recursos en la Casa Migrante.
            </p>

            <!-- Tabla de mobiliarios -->
            <table class="table table-xs mt-6">
                <thead class="text-gray-800 text-sm">
                    <tr>
                        <th class="border-b border-gray-300">#</th>
                        <th class="border-b border-gray-300">Código</th>
                        <th class="border-b border-gray-300">Nombre</th>
                        <th class="border-b border-gray-300">Ubicación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobiliariosSeleccionados as $index => $mobiliario)
                        <tr class="h-12 border-b border-gray-300">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mobiliario['codigo'] }}</td>
                            <td>{{ $mobiliario['nombre_mobiliario'] }}</td>
                            <td>{{ $mobiliario['ubicacion'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Footer con firmas -->
            <footer class="flex flex-col text-center mt-12">
                <p>
                    Agradezco de antemano su colaboración y atención a esta solicitud.
                    Y para los fines que el interesado estime conveniente, firmamos la presente a los <br>
                    <strong><u>{{ $day }}</u></strong> días del mes de
                    <strong><u>{{ $month }}</u></strong> de
                    <strong><u>{{ $year }}</u></strong>.
                </p>

                <!-- Firmas -->
                <section class="flex mt-20">
                    <!-- Firma del solicitante -->
                    <div class="w-1/2 flex flex-col items-center justify-center">
                        <hr class="w-2/3 border-gray-600">
                        <p class="mt-2">Firma de Entrega</p>
                        <p class="mt-1 font-semibold text-gray-700">{{ $nombreSolicitante }}</p>
                    </div>

                    <!-- Firma del aprobador -->
                    <div class="w-1/2 flex flex-col items-center justify-center">
                        <hr class="w-2/3 border-gray-600">
                        <p class="mt-2">Firma de Recibido</p>
                        <p class="mt-1 font-semibold text-gray-700">{{ $nombreAprobador }}</p>
                    </div>
                </section>
            </footer>
        </article>
    </div>
    <!-- Botón de imprimir -->
    <div class="flex justify-end mt-4">
        <button onclick="window.print()" class="btn btn-success text-primary-content border-none print-button">
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
