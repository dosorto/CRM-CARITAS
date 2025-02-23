<div class="h-screen w-full flex flex-col">
    <section class="w-full grow flex justify-center overflow-auto">
        <div class="p-10 mt-8 size-max shadow-lg border-2 border-accent rounded-lg bg-white">

            <article class="prose max-w-none w-[216mm] flex flex-col">
                <header class="relative flex justify-center min-h-[100px]">
                    <!-- Logo superior izquierdo -->
                    <img src="/img/logo-centro.jpg" class="absolute left-1 top-0 h-20" alt="Logo izquierdo">

                    <!-- Título -->
                    <div class="flex flex-col justify-center mr-16">
                        <h2 class="text-2xl font-bold text-center mb-0 text-gray-900" style="font-size: 24px;">Centro de
                            Atención Cáritas</h2>
                        <h3 class="text-lg font-semibold text-center mb-0 text-gray-700" style="font-size: 18px;">Mons.
                            Guido
                            Charbonneau</h3>
                        <h4 class="text-center text-gray-600" style="font-size: 16px;">Ficha de Registro /
                            Consentimiento Entrada y Salida</h4>
                    </div>

                    <!-- Logo superior derecho -->
                    <img src="/img/LOGO2.png" class="absolute right-2 top-4 h-12 alt="Logo derecho">
                </header>

                {{-- <header class="flex justify-between min-h-[100px] w-full h-max">
                    <!-- Titulo -->
                    <div class="flex flex-col justify-center  items-start">
                        <h2 class="text-2xl font-bold text-center mb-0 text-gray-800" style="font-size: 24px;">Centro de
                            Atención Cáritas</h2>
                        <h3 class="text-lg font-semibold text-center mb-0 text-gray-600" style="font-size: 18px;">Mons.
                            Guido
                            Charbonneau</h3>
                        <h4 class="text-center text-gray-500" style="font-size: 16px;">Ficha de Registro /
                            Consentimiento Entrada y Salida</h4>
                    </div>

                    <!-- Logos -->
                    <div class="flex items-center">
                        <div class="border-r-2 border-gray-300 px-6 py-3">
                            <img src="/img/logo-centro.jpg" class="h-20" alt="Logo izquierdo">
                        </div>
                        <div class="p-6">
                            <img src="/img/LOGO2.png" class="h-16 alt="Logo derecho">
                        </div>
                    </div>
                </header> --}}




                <section>

                </section>

            </article>
        </div>
    </section>

    <footer class="w-full flex flex-col gap-6 p-4 h-max print:hidden">
        <button class="btn btn-info flex-nowrap w-max" onclick="window.print();">
            <span class="icon-[material-symbols--print] size-6"></span>
            Imprimir
        </button>
    </footer>

    {{-- Estilos específicos para impresión y visualización --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;600;700&display=swap');

        /* Configuración para usar la tipografía Figtree */
        body {
            font-family: 'Figtree', sans-serif;
        }

        /* Estilos para pantalla */
        article {
            transform-origin: top left;
            min-width: 216mm !important;
            width: 216mm !important;
            box-sizing: border-box !important;
        }

        /* Estilos para impresión */
        @media print {
            @page {
                size: Letter;
                margin: 10mm;
            }

            body * {
                visibility: hidden;
            }

            article,
            article * {
                visibility: visible;
            }

            article {
                position: absolute;
                left: 0;
                top: 0;
                width: 216mm !important;
                min-width: 216mm !important;
                margin: 0 !important;
                padding: 0 !important;
                transform-origin: top left;
            }

            /* Mantener tamaños de fuente fijos */
            article h2 {
                font-size: 24px !important;
            }

            article h3 {
                font-size: 18px !important;
            }

            article h4 {
                font-size: 16px !important;
            }
        }
    </style>
</div>
