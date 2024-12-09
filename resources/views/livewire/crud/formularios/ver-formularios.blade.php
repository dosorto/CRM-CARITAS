<main class=" min-h-screen flex flex-col items-center justify-center py-8">
    <!-- Contenedor del formulario -->
    <div id="formulario-captura"
        class="relative bg-white p-8 rounded-lg max-w-3xl w-full space-y-6 print-section">

        <!-- Logo superior izquierdo -->
        <img src="/img/logo-centro.jpg" class="absolute top-4 left-6 h-16 w-16 m-4" alt="Logo izquierdo">

        <!-- Logo superior derecho -->
        <img src="/img/LOGO2.png" class="absolute top-3 right-0 h-12 w-36 m-4" alt="Logo derecho">

        <!-- Título del formulario -->
        <div class="¿size-max flex flex-col justify-center text-center">


            <h2 class="text-3xl font-bold text-center mb-0 text-gray-800">Centro de Atención Cáritas</h2>
            <h3 class="text-xl font-semibold text-center mb-0 text-gray-600">Mons. Guido Charbonneau</h3>
            <h4 class="text-lg text-center mb-0 text-gray-500">Ficha de Registro / Consentimiento Entrada y Salida</h4>
        </div>
        <!-- Formulario de Registro -->
        <section id="registroForm" class="space-y-6 text-gray-700">
            <!-- Sección: Datos Generales -->
            <div class="flex flex-col w-full">
                <p class="text-lg font-semibold text-gray-700 mb-4">I. Datos Generales</p>

                <div class="flex flex-row gap-6 w-full mb-4">
                    <!-- Nombre completo -->
                    <div class="flex mb-2 w-2/3">
                        <label for="nombreCompleto" class="text-gray-600 mb-1 text-nowrap">Nombre completo:</label>
                        <label class="px-4 w-full border-b-2 border-gray-600">
                            {{ $nombreCompleto }}
                            {{-- Mario Fernando Carbajal Galo --}}
                        </label>
                    </div>
                    <!-- Fecha de ingreso -->
                    <div class="flex mb-2 w-1/3">
                        <label for="fechaIngreso" class="text-gray-600 mb-1 text-nowrap">Fecha de ingreso:</label>
                        <label class="px-4 w-full border-b-2 border-gray-600">
                            {{ $fechaIngreso }}
                        </label>
                    </div>
                </div>


                <div class="flex flex-row gap-6 w-full mb-4">
                    <!-- Número de Identificacion -->
                    <div class="flex mb-2 w-2/3">
                        <label for="nombreCompleto" class="text-gray-600 mb-1 text-nowrap">
                            Número de Identificación:</label>
                        <label class="px-4  w-full border-b-2 border-gray-600">
                            {{ $identificacion }}
                        </label>
                    </div>

                    <!-- Tipo de Documento de Identificación -->
                    <div class="flex mb-2 w-1/3">
                        <label for="nombreCompleto" class="text-gray-600 mb-1 text-nowrap">
                            Documento:
                        </label>
                        <label class="px-4  w-full border-b-2 border-gray-600">
                            {{ $tipoIdentificacion }}
                            {{-- DNI --}}
                        </label>
                    </div>
                </div>

                <!-- Edad, sexo y fecha de nacimiento -->
                <div class="flex gap-4 mb-4 w-full">
                    <!-- Edad -->
                    <div class="flex mb-2 w-1/6">
                        <label for="nombreCompleto" class="text-gray-600 mb-1 text-nowrap">
                            Edad:</label>
                        <label class="px-4  w-full border-b-2 border-gray-600">
                            {{ $edad }}
                        </label>
                    </div>
                    <!-- Sexo -->
                    <div class="flex mb-2 w-2/6">
                        <label for="nombreCompleto" class="text-gray-600 mb-1 text-nowrap">
                            Sexo:</label>
                        <label class="px-4  w-full border-b-2 border-gray-600">
                            {{ $sexo }}</label>
                    </div>
                    <!-- Fecha de Nacimiento -->
                    <div class="flex mb-2 w-3/6">
                        <label for="nombreCompleto" class="text-gray-600 mb-1 text-nowrap">
                            Fecha de Nacimiento:</label>
                        <label class="px-4  w-full border-b-2 border-gray-600">
                            {{ $fechaNacimiento }}</label>
                    </div>
                </div>

                <div class="flex w-full gap-6">

                    <!-- Nacionalidad -->
                    <div class="flex mb-2 w-1/2">
                        <label for="nombreCompleto" class="text-gray-600 mb-1 text-nowrap">
                            País de Procedencia:</label>
                        <label class="px-4  w-full border-b-2 border-gray-600">
                            {{ $pais }}</label>
                    </div>

                    <!-- Nacionalidad -->
                    <div class="flex mb-2 w-1/2 items-center justify-center gap-2">
                        <label class="text-gray-600 mb-1 text-nowrap">¿Pertenece a LGBTQI+?: </label>
                        <label class="px-4 border-b-2 border-gray-600">
                            {{ $esLGBT }}</label>
                        <span class="icon-[circle-flags--lgbt] size-7"></span>
                    </div>
                </div>
            </div>

            <!-- Sección: Situación Encontrada -->
            <div>
                <p class="text-lg font-semibold text-gray-700 mb-2">II. Situación Encontrada</p>

                <!-- Situacion migratoria -->
                <div class="flex flex-col mt-2 items-start justify-center">
                    <label class="text-gray-600 mb-1 text-nowrap">Situación Migratoria en la que se Encuentra: </label>
                    <label class="px-4 w-full border-b-2 border-gray-600">
                        {{ $situacion }}</label>
                </div>
                <!-- Situacion migratoria -->
                <div class="flex flex-col mt-4 items-start justify-center">
                    <label class="text-gray-600 mb-1 text-nowrap">
                        Capacidades Especiales / Discapacidades Físicas</label>
                    <label class="px-4 w-full border-b-2 border-gray-600">
                        {{ $discapacidades }}</label>
                </div>
            </div>


            <!-- Texto final -->
            <div class="flex flex-col">
                <p class="text-justify text-gray-700">

                    Solicito estadía temporal en el "Centro de Atención Cáritas Mons. Guido Charbonneau". Declaro
                    conocer y aceptar el reglamento del centro, y autorizo compartir mi información con ACNUR u otras
                    organizaciones internacionales de apoyo migratorio. Firmo para constancia.

                    {{-- Mediante la presente manifiesto que solicito estadía temporal en el "CENTRO DE ATENCION CÁRITAS
                    MONS. GUIDO CHARBONNEAU", tengo conocimiento del contenido del reglamento en el Centro de Atención,
                    el cual cumpliré en todo y cada una de sus partes, así mismo doy mi consentimiento para que mi
                    información sea socializada con la Agencia de la ONU para los Refugiados (ACNUR) o cualquier
                    organización internacional que apoye el tema de migración, para constancia firmo el presente
                    documento. --}}
                </p>
            </div>

            <!-- Firma Ingreso -->
            <div class="flex flex-col">
                <div class="w-full flex justify-center mt-6">
                    <div class="w-1/2 flex flex-row items-end gap-42">
                        <label for="firma" class="text-gray-600 font-semibold">Fecha de Salida:</label>
                        <hr class="border border-gray-500 w-3/5">
                    </div>
                </div>
                <div class="w-full flex gap-4 justify-between mt-16">
                    <div class="w-full items-center flex justify-center flex-col">
                        <hr class="border border-gray-500 w-2/3">
                        <label for="firma" class="text-gray-600">Firma Ingreso:</label>
                    </div>
                    <div class="w-full items-center flex justify-center flex-col">
                        <hr class="border border-gray-500 w-2/3">
                        <label for="firma" class="text-gray-600">Firma Salida:</label>
                    </div>
                </div>

            </div>
        </section>

    </div>
    <!-- Botón de imprimir -->
    <div class="flex justify-center mt-6">
        <button onclick="window.print()" class="btn bg-primary text-primary-content border-none print-button">
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

            .print-button {
                display: none;
            }
        }
    </style>
</main>
