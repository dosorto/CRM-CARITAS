<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
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
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center py-8 ">
    <!-- Contenedor del formulario -->
    <div id="formulario-captura"
        class="relative bg-white p-8 rounded-lg shadow-lg max-w-3xl w-full space-y-6 print-section">

        <!-- Logo superior izquierdo -->
        <img src="/img/LOGO1.png" class="absolute top-4 left-0 h-10 w-30 m-4" alt="Logo izquierdo">

        <!-- Logo superior derecho -->
        <img src="/img/LOGO2.png" class="absolute top-3 right-0 h-10 w-30 m-4" alt="Logo derecho">

        <!-- Título del formulario -->
        <div class="¿size-max flex flex-col justify-center text-center">


            <h2 class="text-3xl font-bold text-center mb-0 text-gray-800">Centro de Atención Cáritas</h2>
            <h3 class="text-xl font-semibold text-center mb-0 text-gray-600">Mons. Guido Charbonneau</h3>
            <h4 class="text-lg text-center mb-0 text-gray-500">Ficha de Registro / Consentimiento Entrada y Salida</h4>
        </div>
        <!-- Formulario de Registro -->
        <form id="registroForm" class="space-y-6">

            <!-- Sección: Datos Generales -->
            <div>
                <p class="text-lg font-semibold text-gray-700 mb-4">I. Datos Generales</p>

                <!-- Fecha de ingreso -->
                <div class="flex flex-col mb-2">
                    <label for="fechaIngreso" class="text-gray-600 mb-1">Fecha de ingreso:</label>
                    <input type="date" id="fechaIngreso" name="fechaIngreso" class="px-4 py-1 border rounded-lg">
                </div>

                <!-- Nombre completo -->
                <div class="flex flex-col mb-2">
                    <label for="nombreCompleto" class="text-gray-600 mb-1">Nombre completo:</label>
                    <input type="text" id="nombreCompleto" name="nombreCompleto"
                        class="px-4 py-1 border rounded-lg w-full">
                </div>

                <!-- Número de identificación -->
                <div class="flex flex-col mb-2">
                    <label for="numeroIdentificacion" class="text-gray-600 mb-1">Número de Identificación:</label>
                    <input type="text" id="numeroIdentificacion" name="numeroIdentificacion"
                        class="px-4 py-1 border rounded-lg w-3/4">
                </div>

                <!-- Tipo de documento -->
                <label for="tipoDocumento" class="text-gray-600 mb-2">Tipo de documento:</label>
                <div class="flex gap-4 mb-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="cedula" name="tipoDocumento" value="Cédula" class="rounded">
                        <label for="cedula">Cédula</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="pasaporte" name="tipoDocumento" value="Pasaporte" class="rounded">
                        <label for="pasaporte">Pasaporte</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="otro" name="tipoDocumento" value="Otro" class="rounded">
                        <label for="otro">Otro</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="noDocumento" name="tipoDocumento" value="No tiene documento"
                            class="rounded">
                        <label for="noDocumento">No tiene documento</label>
                    </div>
                </div>

                <!-- Edad, sexo y fecha de nacimiento -->
                <div class="grid grid-cols-3 gap-4 mb-2">
                    <div class="flex flex-col">
                        <label for="edad" class="text-gray-600 mb-1">Edad:</label>
                        <input type="number" id="edad" name="edad" class="px-4 py-1 border rounded-lg">
                    </div>
                    <div class="flex flex-col">
                        <label for="sexo" class="text-gray-600 mb-1">Sexo:</label>
                        <input type="text" id="sexo" name="sexo" class="px-4 py-1 border rounded-lg">
                    </div>
                    <div class="flex flex-col">
                        <label for="fechaNacimiento" class="text-gray-600 mb-1">Fecha de nacimiento:</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento"
                            class="px-4 py-1 border rounded-lg">
                    </div>
                </div>

                <!-- Nacionalidad y LGTBIQ+ -->
                <div class="flex flex-col mb-2">
                    <label for="nacionalidad" class="text-gray-600 mb-1">Nacionalidad:</label>
                    <input type="text" id="nacionalidad" name="nacionalidad"
                        class="px-4 py-1 border rounded-lg w-3/4">
                </div>

                <!-- LGTBIQ+ -->
                <label for="lgtbiq" class="text-gray-600 mb-2">LGTBIQ+:</label>
                <div class="flex gap-4 mb-2">
                    <div class="flex items-center gap-2">
                        <input type="radio" id="lgtbiqSi" name="lgtbiq" value="Sí" class="rounded">
                        <label for="lgtbiqSi">Sí</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" id="lgtbiqNo" name="lgtbiq" value="No" class="rounded">
                        <label for="lgtbiqNo">No</label>
                    </div>
                </div>
            </div>

            <!-- Sección: Situación Encontrada -->
            <div>
                <p class="text-lg font-semibold text-gray-700 mb-2">II. Situación Encontrada</p>
                <label for="situacion" class="text-gray-600 mb-2">Seleccione la situación:</label>
                <select id="situacion" name="situacion" class="px-4 py-2 border rounded-lg w-full">
                    <option value="Protección Internacional">Persona con necesidad de Protección Internacional</option>
                    <option value="Refugiados">Refugiados</option>
                    <option value="Solicitantes de asilo">Solicitantes de Asilo</option>
                    <option value="Migrante en tránsito">Migrante en tránsito</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <!-- Capacidad especial -->
            <div class="flex flex-col mb-2">
                <label for="capacidadEspecial" class="text-gray-600 mb-1">Capacidad especial:</label>
                <input type="text" id="capacidadEspecial" name="capacidadEspecial"
                    class="px-4 py-1 border rounded-lg w-3/4">
            </div>

            <!-- Personas acompañantes -->
            <div class="flex flex-col mb-2">
                <label for="acompanantes" class="text-gray-600 mb-1">Acompañantes (si aplica):</label>
                <input type="text" id="acompanantes" name="acompanantes"
                    class="px-4 py-1 border rounded-lg w-full">
            </div>

            <!-- Texto final -->
            <div class="flex flex-col mb-2">
                <p class="text-justify text-gray-700">
                    Mediante la presente manifiesto que solicito estadía temporal en el "CENTRO DE ATENCION CÁRITAS
                    MONS. GUIDO CHARBONNEAU", tengo conocimiento del contenido del reglamento en el Centro de Atención,
                    el cual cumpliré en todo y cada una de sus partes, así mismo doy mi consentimiento para que mi
                    información sea socializada con la Agencia de la ONU para los Refugiados (ACNUR) o cualquier
                    organización internacional que apoye el tema de migración, para constancia firmo el presente
                    documento.
                </p>
            </div>

            <!-- Firma Ingreso -->
            <div class="flex flex-col mb-2">
                <label for="firma" class="text-gray-600 mb-1">Firma Ingreso:</label>
                <input type="text" id="firma" name="firma"
                    class="px-4 py-2 border-b border-gray-400 w-3/4">
            </div>

            <!-- Botón de imprimir -->
            <div class="flex justify-end mt-4">
                <button @click="window.print()" class="btn bg-primary text-primary-content border-none print-button">
                    Imprimir
                </button>
            </div>

        </form>
    </div>
</body>

</html>
