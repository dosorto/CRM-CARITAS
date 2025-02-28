<div class="h-screen w-full flex flex-col">
    <section class="w-full grow flex justify-center overflow-auto">
        <div class="p-10 mt-8 size-max shadow-lg border-2 border-accent rounded-lg bg-white">

            <article class="prose max-w-none w-[216mm] h-[279mm] max-h-none flex flex-col">
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
                            Consentimiento de Entrada y Salida</h4>
                    </div>

                    <!-- Logo superior derecho -->
                    <img src="/img/LOGO2.png" class="absolute right-2 top-4 h-12 alt="Logo derecho">
                </header>

                {{-- Información --}}
                <section class="flex flex-col mt-4 text-sm justify-start">

                    <h3 class="font-bold text-base mb-1">I. Datos Personales</h3>

                    <div class="flex flex-col border border-zinc-600 rounded-lg">

                        <div class="flex border-b border-zinc-600">
                            <div class="flex flex-col w-2/3 ">
                                <div class="flex w-full border-b border-zinc-600">
                                    <div class="flex w-[85%] h-full pl-2 pr-6 gap-1 items-center min-h-8 py-1">
                                        <b>Nombre: </b> {{ $nombre }}
                                    </div>


                                </div>

                                <div class="flex pl-2 min-h-8">

                                    <span
                                        class="flex items-center text-wrap h-max min-w-80 pr-6 py-1 min-h-8 max-w-96 gap-1">
                                        <b>Identificación: </b> {{ $identificacion }}
                                    </span>
                                    <span class="flex items-center justify-start pl-2 gap-1 border-l border-zinc-600">
                                        <b>Sexo:</b> {{ $sexo }}
                                    </span>

                                </div>
                            </div>

                            <div class="flex flex-col justify-center w-1/3 border-l border-zinc-600 pl-4 min-h-16">
                                <span>¿Viaja en <b>Grupo</b> o <b>Familia</b>? </span>
                                <div class="flex mt-1 font-bold items-center">
                                    <span class="icon-[fa-solid--users] size-6 text-zinc-600"></span>
                                    <span class="ml-3 flex items-center gap-1">
                                        <span class="icon-[cuida--checkbox-checked-outlined] size-6"></span>
                                        Si
                                    </span>
                                    <span class="ml-4 flex items-center gap-1">
                                        <span class="icon-[ci--checkbox-unchecked] size-6"></span>
                                        No
                                    </span>
                                </div>
                            </div>

                        </div>


                        <div class="flex">
                            <div class="flex flex-col w-2/3">
                                <div class="flex pl-2 min-h-8 border-b border-zinc-600">
                                    <span
                                        class="flex items-center text-wrap h-max min-w-80 pr-6 py-1 min-h-8 max-w-96 gap-1">
                                        <b>Fecha de Nacimiento: </b> {{ $fechaNacimiento }}
                                    </span>
                                    <span class="flex items-center justify-start pl-2 gap-1 border-l border-zinc-600">
                                        <b>Estado Civil:</b> {{ $estadoCivil }}
                                    </span>

                                </div>

                                <div class="flex pl-2 min-h-8">
                                    <span class="flex items-center text-wrap h-full min-w-80 pr-6 gap-1">
                                        <b>País: </b> {{ $pais }}
                                    </span>

                                    @if ($codigoFamiliar)
                                        <span
                                            class="flex h-full w-full items-center pl-2 gap-1 border-l border-zinc-600">
                                            <b>Familia # </b> {{ $codigoFamiliar }}
                                        </span>
                                    @endif
                                    <div class="flex font-bold w-max h-full border-l border-zinc-600 items-center px-2">
                                        <span class="icon-[noto--drop-of-blood] size-5"></span>
                                        <span class="font-bold text-base">{{ $tipoSangre }}</span>
                                    </div>
                                </div>

                            </div>


                            <div class="flex flex-col justify-center w-1/3 border-l border-zinc-600 pl-4 min-h-16">
                                <span>¿Pertenece a la comunidad <b>LGBTQI+</b>? </span>
                                <div class="flex mt-1 font-bold items-center">
                                    <span class="icon-[circle-flags--lgbt] size-6"></span>
                                    <span class="ml-3 flex items-center gap-1">
                                        <span class="icon-[ci--checkbox-unchecked] size-6"></span>
                                        Si
                                    </span>

                                    <span class="ml-4 flex items-center gap-1">
                                        <span class="icon-[cuida--checkbox-checked-outlined] size-6"></span>
                                        No
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="flex flex-col my-6 text-sm">
                    <h3 class="font-bold text-base mb-1">II. Datos Migratorios</h3>

                    <div class="flex-col flex border border-zinc-600 rounded-lg">
                        <div class="flex border-b border-zinc-600">
                            <div class="flex flex-col w-3/4 size-full border-r border-zinc-600">
                                <div class="border-b border-zinc-600 py-1 px-2">
                                    <span><b>Situación Migratoria: </b>{{ $situacionMigratoria }}</span>
                                </div>
                                <div class="py-1 px-2">
                                    <span><b>Necesidades: </b> {{ $necesidades }}.
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-col w-1/4 text-center justify-center">
                                <span><b>Fecha de Ingreso:</b></span>
                                <span>{{ $fechaIngreso }}</span>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="flex flex-col w-3/4 size-full border-r border-zinc-600">
                                <div class="border-b border-zinc-600 py-1 px-2">
                                    <span><b>Discapacidades: </b>{{ $discapacidades }}</span>
                                </div>
                                <div class="py-1 px-2">
                                    <span><b>Observación: </b> {{ $observacion }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col w-1/4 text-center justify-start p-1.5">
                                <span><b>Fecha de Salida:</b></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="my-2">
                    <p>
                        Solicito estadía temporal en el Centro de Atención Cáritas Mons. Guido Charbonneau. Declaro
                        conocer y aceptar su reglamento, comprometiéndome a su cumplimiento. Asimismo, autorizo el uso y
                        compartición de mi información con ACNUR y otras organizaciones internacionales de apoyo
                        migratorio. Entiendo que, al firmar este documento, tengo derecho a recibir comida, agua y
                        alojamiento. Firmo para constancia.
                    </p>
                </section>

                {{-- Firmas --}}
                <section>

                </section>

            </article>
        </div>
    </section>

    <footer class="w-full flex flex-col gap-6 p-4 h-max print:hidden shadow-inner border-t border-accent">
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

            * {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
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
                height: 279mm;
                min-height: 279mm !important;
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
