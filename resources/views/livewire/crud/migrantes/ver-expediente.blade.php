<div class="h-screen w-full flex flex-col">
    <section class="w-full grow flex justify-center overflow-auto">

        <div class="p-12 my-10 size-max shadow-lg border-2 border-accent rounded-lg bg-white">

            <article
                class="prose max-w-none w-[216mm] h-[279mm] max-h-none flex flex-col text-gray-800 bg-white border-none">
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
                <section class="flex flex-col mt-6 text-sm justify-start">

                    <h3 class="font-bold text-base mb-1">I. Datos Personales</h3>

                    <div class="flex flex-col border border-zinc-600 rounded-lg">

                        <div class="flex border-b border-zinc-600">
                            <div class="flex flex-col w-2/3 ">
                                <div class="flex w-full border-b border-zinc-600">
                                    <div class="flex h-full pl-2 pr-6 gap-1 items-center min-h-8">
                                        <b>Nombre: </b> {{ $nombre }}
                                    </div>


                                </div>

                                <div class="flex pl-2 min-h-8">

                                    <span
                                        class="flex items-center text-wrap h-max min-w-80 pr-6 min-h-8 max-w-96 gap-1">
                                        <b>Identificación: </b> {{ $identificacion }}
                                    </span>
                                    <span class="flex items-center justify-start pl-2 gap-1 border-l border-zinc-600">
                                        <b>Sexo:</b>
                                        {{ $sexo }}
                                        <span @class([
                                            'size-4',
                                            'icon-[twemoji--female-sign]' => $sexo === 'Femenino',
                                            'icon-[twemoji--male-sign]' => $sexo === 'Masculino',
                                        ])>
                                        </span>

                                </div>
                            </div>

                            <div class="flex flex-col justify-center w-1/3 border-l border-zinc-600 pl-4 min-h-16">
                                <span>¿Pertenece a la comunidad <b>LGBTQI+</b>? </span>
                                <div class="flex mt-1 font-bold items-center">
                                    <span class="icon-[circle-flags--lgbt] size-6"></span>
                                    <span class="ml-3 flex items-center gap-0.5">

                                        <span @class([
                                            'size-6',
                                            'icon-[cuida--checkbox-checked-outlined]' => $esLGBT === 1,
                                            'icon-[ci--checkbox-unchecked]' => $esLGBT === 0 || $esLGBT === 'void',
                                        ])></span>
                                        Si
                                    </span>

                                    <span class="ml-4 flex items-center gap-0.5">
                                        <span @class([
                                            'size-6',
                                            'icon-[cuida--checkbox-checked-outlined]' => $esLGBT === 0,
                                            'icon-[ci--checkbox-unchecked]' => $esLGBT === 1 || $esLGBT === 'void',
                                        ])></span>
                                        No
                                    </span>
                                </div>

                            </div>

                        </div>


                        <div class="flex border-b border-zinc-600">
                            <div class="flex flex-col w-2/3">
                                <div class="flex pl-2 min-h-8 border-b border-zinc-600">
                                    <span
                                        class="flex items-center text-wrap h-max min-w-80 pr-6 min-h-8 max-w-96 gap-1">
                                        <b>Tipo de Identificación: </b> {{ $tipoIdentificacion }}

                                    </span>
                                    <span class="flex items-center justify-start pl-2 gap-1 border-l border-zinc-600">
                                        <b>Estado Civil: </b> {{ $estadoCivil }}
                                    </span>

                                </div>

                                <div class="flex pl-2 min-h-8">
                                    <span class="flex items-center text-wrap h-full min-w-80 pr-6 gap-1">
                                        <b>Fecha de Nacimiento: </b> {{ $fechaNacimiento }}
                                    </span>


                                    <span class="flex h-full w-full items-center pl-2 gap-1 border-l border-zinc-600">
                                        <b>Edad:</b> {{ $edad }}


                                    </span>

                                </div>

                            </div>


                            <div class="flex flex-col justify-center w-1/3 border-l border-zinc-600 pl-4 min-h-16">
                                <span>¿Viaja en <b>Grupo</b> o <b>Familia</b>? </span>
                                <div class="flex mt-1 font-bold items-center">
                                    <span class="icon-[fa-solid--users] size-6 text-zinc-600"></span>
                                    <span class="ml-3 flex items-center gap-0.5">
                                        <span @class([
                                            'size-6',
                                            'icon-[cuida--checkbox-checked-outlined]' =>
                                                $codigoFamiliar >= 1,
                                            'icon-[ci--checkbox-unchecked]' =>
                                                $codigoFamiliar === 0 || $codigoFamiliar === 'void',
                                        ])></span>
                                        Si
                                    </span>
                                    <span class="ml-4 flex items-center gap-0.5">
                                        <span @class([
                                            'size-6',
                                            'icon-[cuida--checkbox-checked-outlined]' => $codigoFamiliar >= 0,
                                            'icon-[ci--checkbox-unchecked]' =>
                                                $codigoFamiliar === 1 || $codigoFamiliar === 'void',
                                        ])></span>
                                        No
                                    </span>
                                </div>
                            </div>
                        </div>


                        <div class="flex">
                            <div class="flex flex-col w-2/3">
                                <div class="flex pl-2 min-h-8">
                                    <span
                                        class="flex items-center text-wrap h-max min-w-80 pr-6 min-h-8 max-w-96 gap-1">
                                        <b>País: </b> {{ $pais }}

                                    </span>
                                    <span class="flex items-center justify-start pl-2 gap-1 border-l border-zinc-600">
                                        <b>Grupo Sanguíneo:</b>
                                        <span class="icon-[noto--drop-of-blood] size-5"></span>
                                        <span
                                            class="font-semibold text-base">{{ $tipoSangre == 'Desconocido' ? '?' : $tipoSangre }}</span>

                                    </span>

                                </div>



                            </div>

                            @if ($codigoFamiliar && $codigoFamiliar !== 'void')
                                <div class="flex justify-center items-center w-1/3 border-l border-zinc-600 pl-2">
                                    <b>Familia # </b> {{ $codigoFamiliar }}
                                </div>
                            @endif

                        </div>

                        <div
                            class="flex border-t border-zinc-600 min-h-16 px-2 py-1 {{ $codigoFamiliar !== 'void' ? 'hidden' : '' }}">
                            <b>Información del Familiar: </b>
                        </div>


                    </div>
                </section>

                <section class="flex flex-col my-8 text-sm">
                    <h3 class="font-bold text-base mb-1">II. Datos Migratorios</h3>

                    <div class="flex-col flex border border-zinc-600 rounded-lg">
                        <div class="flex">
                            <div class="flex flex-col size-full">
                                <div class="px-2 min-h-8 py-1 items-center flex border-b border-zinc-600">
                                    <span><b>Situación Migratoria: </b>{{ $situacionMigratoria }}</span>
                                </div>
                                <div class="min-h-8 py-1 items-center flex px-2 border-b border-zinc-600">
                                    <span><b>Frontera por la que Ingresó al País: </b> {{ $frontera }}</span>
                                </div>
                                <div class="min-h-8 py-1 items-center flex px-2 border-b border-zinc-600">
                                    <span><b>Entidad que lo Guió al Centro: </b>{{ $asesorMigratorio }}</span>
                                </div>
                                <div class="min-h-8 py-1 items-center flex px-2 border-b border-zinc-600">
                                    <span><b>Motivos por los que Salió del País: </b>{{ $motivos }}.</span>
                                </div>
                                <div class="min-h-8 py-1 items-center flex px-2 border-b border-zinc-600">
                                    <span><b>Discapacidades: </b>{{ $discapacidades }}.</span>
                                </div>
                                <div class="min-h-8 py-1 items-center flex px-2 border-b border-zinc-600">
                                    <span><b>Necesidades: </b>{{ $necesidades }}.</span>
                                </div>
                                <div class="min-h-16 flex px-2 py-1 border-b border-zinc-600 break-all">
                                    <span><b>Observación: </b> {{ $observacion }}</span>
                                </div>
                                <div class="min-h-10 items-center flex w-full">
                                    <div class="size-full flex gap-1 items-center border-r border-zinc-600 pl-2">
                                        <b>Fecha de Ingreso:</b>
                                        {{ $fechaIngreso }}
                                    </div>
                                    <div class="size-full flex justify-between gap-1 items-center px-2">
                                        <span>
                                            <b>Fecha de Salida:</b>
                                            @if ($mostrarFechaSalida)
                                                {{ $fechaSalida }}
                                            @endif
                                        </span>

                                        @if ($fechaSalida)
                                            <div class="tooltip tooltip-primary tooltip-left print:hidden"
                                                data-tip="Ocultar / Mostrar la fecha de Salida">
                                                <button class="btn btn-ghost btn-sm p-1"
                                                    wire:click="cambiarVisibilidadFechaSalida">
                                                    <span class="icon-[iconoir--eye] size-6"></span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                <section class="my-2 grow">
                    <p>
                        Solicito estadía temporal en el Centro de Atención Cáritas Mons. Guido Charbonneau. Declaro
                        conocer y aceptar su reglamento, comprometiéndome a su cumplimiento. Asimismo, autorizo el uso y
                        compartición de mi información con ACNUR y otras organizaciones internacionales de apoyo
                        migratorio. Entiendo que, al firmar este documento, tengo derecho a recibir acceso a internet,
                        comida, agua y alojamiento. Firmo para constancia.
                    </p>
                </section>

                {{-- Firma --}}
                <section class="flex items-end w-full">
                    {{-- Firma de Entrada --}}
                    <div class="w-full flex flex-col items-center">
                        <hr class="border border-zinc-500  w-2/3">
                        <span class="font-semibold">Firma de Ingreso.</span>
                    </div>
                    {{-- Firma de Salida --}}
                    <div class="w-full flex flex-col items-center">
                        <hr class="border border-zinc-500 w-2/3">
                        <span class="font-semibold">Firma de Salida.</span>
                    </div>
                </section>
            </article>
        </div>
    </section>

    <footer class="w-full flex p-4 h-max print:hidden shadow-inner border-t border-accent justify-between">
        <div class="flex gap-4">
            @can('imprimir-expediente')
                <button class="btn btn-info flex-nowrap w-max" onclick="window.print();">
                    <span class="icon-[material-symbols--print] size-6"></span>
                    Imprimir
                </button>
            @endcan
            <div wire:loading class="h-full flex items-center">
                <div class="h-full">
                    <span class=" loading loading-spinner loading-lg"></span>
                </div>
            </div>
        </div>


        <div class="flex gap-4">
            @can('ver-migrantes')
                @if ($identificacion)
                    <button class="btn btn-accent w-max flex-nowrap" wire:click="verHistorial">
                        <span class="icon-[mdi--account-file-text] size-6"></span>
                        Historial
                    </button>
                @endif
                <button class="btn btn-accent flex-nowrap w-max" wire:click="verMigrantes">
                    <span class="icon-[fa-solid--users] size-6"></span>
                    Listado de Migrantes
                </button>
            @endcan
        </div>
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
                margin-top: 10mm;
                margin-bottom: 0mm;
                margin-left: 10mm;
                margin-right: 10mm;
                background: white !important;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact;
            }

            body * {
                visibility: hidden;
            }

            body {
                background: white !important;
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
        }
    </style>
</div>
