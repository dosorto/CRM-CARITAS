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
    <div id="formulario-captura" class="relative p-8 rounded-lg shadow-lg max-w-3xl w-full">

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
        
            <p class="section-title">I. Datos Generales</p>

            <!-- Fecha de ingreso -->
            <div class="input-group">
                <label for="fechaIngreso">Fecha de ingreso:</label>
                <input type="date" id="fechaIngreso" name="fechaIngreso">
            </div>
    
            <!-- Nombre completo -->
            <div class="input-group">
                <label for="nombreCompleto">Nombre completo:</label>
                <input type="text" id="nombreCompleto" name="nombreCompleto" style="width: 400px;">
            </div>
    
            <!-- Número de identificación -->
            <div class="input-group">
                <label for="numeroIdentificacion">Número de Identificación:</label>
                <input type="text" id="numeroIdentificacion" name="numeroIdentificacion" style="width: 300px;">
            </div>
    
            <!-- Tipo de documento -->
            <label for="tipoDocumento">Tipo de documento:</label>
            <div class="checkbox-group">
                <div>
                    <input type="checkbox" id="cedula" name="tipoDocumento" value="Cédula">
                    <label for="cedula">Cédula</label>
                </div>
                <div>
                    <input type="checkbox" id="pasaporte" name="tipoDocumento" value="Pasaporte">
                    <label for="pasaporte">Pasaporte</label>
                </div>
                <div>
                    <input type="checkbox" id="otro" name="tipoDocumento" value="Otro">
                    <label for="otro">Otro</label>
                </div>
                <div>
                    <input type="checkbox" id="noDocumento" name="tipoDocumento" value="No tiene documento">
                    <label for="noDocumento">No tiene documento</label>
                </div>
            </div>
    
            <!-- Edad, sexo y fecha de nacimiento -->
            <div class="input-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" style="width: 100px;">
            </div>
    
            <div class="input-group">
                <label for="sexo">Sexo:</label>
                <input type="text" id="sexo" name="sexo" style="width: 100px;">
            </div>
    
            <div class="input-group">
                <label for="fechaNacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" style="width: 200px;">
            </div>
    
            <!-- Nacionalidad y LGTBIQ+ -->
            <div class="input-group">
                <label for="nacionalidad">Nacionalidad:</label>
                <input type="text" id="nacionalidad" name="nacionalidad" style="width: 300px;">
            </div>
    
            <div class="input-group">
                <label for="lgtbiq">LGTBIQ+ (Sí o No):</label>
                <input type="text" id="lgtbiq" name="lgtbiq" style="width: 100px;">
            </div>
    
            <!-- Motivo de salida y otras preguntas -->
            <div class="input-group">
                <label for="motivoSalida">Motivo de salida de su país:</label>
                <input type="text" id="motivoSalida" name="motivoSalida" style="width: 400px;">
            </div>
    
            <div class="input-group">
                <label for="necesidades">Necesidades en este momento:</label>
                <input type="text" id="necesidades" name="necesidades" style="width: 500px;">
            </div>
    
            <div class="input-group">
                <label for="frontera">Frontera por la que ingresó:</label>
                <input type="text" id="frontera" name="frontera" style="width: 300px;" style="height: 50px;">
            </div>
    
            <div class="input-group">
                <label for="orientacion">¿Le orientaron sobre cómo llegar?:</label>
                <input type="text" id="orientacion" name="orientacion" style="width: 200px;">
            </div>
    
            <div class="input-group">
                <label for="quien">¿Quién?:</label>
                <input type="text" id="quien" name="quien" style="width: 300px;">
            </div>
    
            <p class="section-title">II. Situación Encontrada</p>
    
            <!-- Protección Internacional -->
            <div class="checkbox-group">
                <input type="checkbox" id="proteccionInternacional" name="situacion" value="Protección Internacional">
                <label for="proteccionInternacional">Persona con necesidad de Protección Internacional</label>
            </div>
    
            <!-- Refugiados -->
            <div class="checkbox-group">
                <input type="checkbox" id="refugiados" name="situacion" value="Refugiados">
                <label for="refugiados">Refugiados</label>
            </div>
    
            <!-- Solicitantes de asilo -->
            <div class="checkbox-group">
                <input type="checkbox" id="solicitantesAsilo" name="situacion" value="Solicitantes de asilo">
                <label for="solicitantesAsilo">Solicitantes de Asilo</label>
            </div>
    
            <!-- Migrantes en tránsito -->
            <div class="checkbox-group">
                <input type="checkbox" id="migranteTransito" name="situacion" value="Migrante en tránsito">
                <label for="migranteTransito">Migrante en tránsito</label>
            </div>
    
            <!-- Otro -->
            <div class="checkbox-group">
                <input type="checkbox" id="otroSituacion" name="situacion" value="Otro">
                <label for="otroSituacion">Otro</label>
                <input type="text" id="otroEspecificar" name="otroEspecificar" placeholder="Especifique">
            </div>
    
            <!-- Capacidad especial -->
            <div class="input-group">
                <label for="capacidadEspecial">Capacidad especial:</label>
                <input type="text" id="capacidadEspecial" name="capacidadEspecial" style="width: 400px;">
            </div>
    
            <!-- Personas acompañantes -->
            <div class="input-group">
                <label for="acompanantes">Acompañantes (si aplica):</label>
                <input type="text" id="acompanantes" name="acompanantes" style="width: 500px;">
            </div>
                <!-- Texto final -->
                <div class="input-group">
                    <p style="text-align: justify;">
                        Mediante la presente manifiesto que solicito estadía temporal en el "CENTRO DE ATENCION CÁRITAS MONS. GUIDO CHARBONNEAU", tengo conocimiento del contenido del reglamento en el Centro de Atención, el cual cumpliré en todo y cada una de sus partes, así mismo doy mi consentimiento para que mi información sea socializada con la Agencia de la ONU para los Refugiados (ACNUR) o cualquier organización internacional que apoye el tema de migración, para constancia firmo el presente documento.
                    </p>
                </div>
            <!-- Firma Ingreso -->
            <div class="signature">
                <label for="firma">Firma Ingreso</label>
                <input type="text" id="firma" name="firma" style="width: 300px;">
            </div>
        </form>
    </div>