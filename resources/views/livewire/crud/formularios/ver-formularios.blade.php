<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-12">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;600;700&display=swap');
        
        /* Configuración para usar la tipografía Figtree */
        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>
<body class="bg-neutral min-h-screen flex items-center justify-center py-8">
    <!-- Contenedor del formulario -->
    <div id="formulario-captura" class="relative bg-base-100 p-8 rounded-lg shadow-lg max-w-3xl w-full">

        <!-- Logo superior izquierdo -->
        <img src="logo-izquierdo.png" class="absolute top-0 left-0 h-16 w-16 m-4" alt="Logo izquierdo">

        <!-- Logo superior derecho -->
        <img src="logo-derecho.png" class="absolute top-0 right-0 h-16 w-16 m-4" alt="Logo derecho">

        <!-- Título del formulario -->
        <h2 class="text-3xl font-bold text-center mb-6 text-base-content">Centro de Atención Cáritas</h2>
        <h3 class="text-xl font-semibold text-center mb-4 text-base-content">Mons. Guido Charbonneau</h3>
        <h4 class="text-lg text-center mb-6 text-base-content">Ficha de Registro / Consentimiento Entrada y Salida</h4>

        <!-- Formulario de Registro -->
        <form id="registroForm" class="space-y-6">
            
            <!-- Nombre completo -->
            <div>
                <label for="nombre" class="block font-semibold text-base-content">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" 
                    class="w-full px-4 py-2 mt- border border-accent rounded-lg bg-accent-content text-base-content focus:outline-none focus:ring focus:ring-primary">
            </div>

            <!-- Edad -->
            <div>
                <label for="edad" class="block font-semibold text-base-content">Edad:</label>
                <input type="number" id="edad" name="edad" 
                    class="w-full px-4 py-2 mt-1 border border-accent rounded-lg bg-accent-content text-base-content focus:outline-none focus:ring focus:ring-primary">
            </div>

            <!-- Nacionalidad -->
            <div>
                <label for="nacionalidad" class="block font-semibold text-base-content">Nacionalidad:</label>
                <input type="text" id="nacionalidad" name="nacionalidad" 
                    class="w-full px-4 py-2 mt-1 border border-accent rounded-lg bg-accent-content text-base-content focus:outline-none focus:ring focus:ring-primary">
            </div>

            <!-- Lugar de Procedencia -->
            <div>
                <label for="procedencia" class="block font-semibold text-base-content">Lugar de Procedencia:</label>
                <input type="text" id="procedencia" name="procedencia" 
                    class="w-full px-4 py-2 mt-1 border border-accent rounded-lg bg-accent-content text-base-content focus:outline-none focus:ring focus:ring-primary">
            </div>

            <!-- Lugar de Destino -->
            <div>
                <label for="destino" class="block font-semibold text-base-content">Lugar de Destino:</label>
                <input type="text" id="destino" name="destino" 
                    class="w-full px-4 py-2 mt-1 border border-accent rounded-lg bg-accent-content text-base-content focus:outline-none focus:ring focus:ring-primary">
            </div>

            <!-- Fecha de Entrada -->
            <div>
                <label for="fechaEntrada" class="block font-semibold text-base-content">Fecha de Entrada:</label>
                <input type="date" id="fechaEntrada" name="fechaEntrada" 
                    class="w-full px-4 py-2 mt-1 border border-accent rounded-lg bg-accent-content text-base-content focus:outline-none focus:ring focus:ring-primary">
            </div>

            <!-- Fecha de Salida -->
            <div>
                <label for="fechaSalida" class="block font-semibold text-base-content">Fecha de Salida:</label>
                <input type="date" id="fechaSalida" name="fechaSalida" 
                    class="w-full px-4 py-2 mt-1 border border-accent rounded-lg bg-accent-content text-base-content focus:outline-none focus:ring focus:ring-primary">
            </div>

            <!-- Botón para generar PDF -->
            <div class="text-center">
                <button type="button" onclick="generarPDF()" 
                    class="bg-primary text-primary-content font-bold py-2 px-4 rounded-lg shadow-md hover:bg-primary-focus focus:outline-none focus:ring focus:ring-primary">
                    Generar PDF
                </button>
            </div>
        </form>
    </div>

</body>
</html>
