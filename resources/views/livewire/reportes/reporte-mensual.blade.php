<div class="mt-2">
    <div class="p-5 grid gap-6 mb-4 md:grid-cols-2">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                inicial</label>
            <input wire:model.live="fecha_inicio" type="date" id="first_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="John" required />
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                final</label>
            <input wire:model.live="fecha_final" type="date" id="last_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Doe" required />
        </div>
    </div>
    <div class="w-full flex justify-end">
        <button onclick="window.print()" type="button" class="btn btn-primary mb-4">
            Imprimir Reporte
        </button>
    </div>
    <div class=" flex justify-center w-full p-6 rounded-md border-2 border-accent mb-8 bg-white text-black">

        <div class="print-section" style="width: 8.5in; height: 11in; font-family: Arial, Helvetica, sans-serif;">
            <!-- Logos -->
            <div class="flex w-full my-4 justify-center gap-8">
                <img class="h-14" src="{{ asset('img/LOGO2.png') }}" alt="">
                <img class="h-14" src="{{ asset('img/LOGO1.png') }}" alt="">
            </div>
            <!-- Ubicacion -->
            <div class="flex flex-col items-center mb-4">

                <span class="font-semibold text-lg">Centro de Atención Cáritas "Mons. Guido Charbonneau"</span>
                <span>Bo. El Hospital, Choluteca, Choluteca, Honduras</span>
                <b>{{ $numeroDia }} de {{ $nombreMes }} del {{ $currentYear }}</b>


            </div>

            <!-- Recuadro rojo -->
            <div class="flex items-center justify-center w-full">
                <div style="width: 80%; border-color: #8a2e2e; color: white;"
                    class="fondo border flex items-center p-2 rounded-lg">
                    <img style="" class="h-14" src="{{ asset('imagenes/reportes/icon-corazon.png') }}"
                        alt="">
                    <div class="text-center" style="font-size: 14px;">
                        <p>
                            Servicios que se brindan de menera gratuita y temporal: <span class="font-semibold">
                                hospedaje,</span>
                        </p>
                        <p class="font-semibold">
                            alimentación, agua, asesoría legal, apoyo psicosocial, lavandería, internet y ropa
                        </p>

                    </div>
                </div>
            </div>


            {{-- Personas y Familias --}}
            <section class="flex mt-8 justify-center gap-12 mx-12">
                <article class="flex flex-col items-center">
                    <img class="size-20" src="{{ asset('imagenes/reportes/family.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_migrantes }}</p>
                    <p class="font-semibold text-sm">Personas refugiadas</p>
                </article>
                <article class="flex flex-col items-center">
                    <img class="h-20" src="{{ asset('imagenes/reportes/icon-man.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_hombres }}</p>
                    <p class="font-semibold text-sm">Hombres</p>
                </article>
                <article class="flex flex-col items-center">
                    <img class="h-20 w-max" src="{{ asset('imagenes/reportes/icon-woman.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_mujeres }}</p>
                    <p class="font-semibold text-sm">Mujeres</p>
                </article>
                <article class="flex flex-col items-center">
                    <img class="h-20 w-max" src="{{ asset('imagenes/reportes/icon-boy.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_ninos }}</p>
                    <p class="font-semibold text-sm">Niños</p>
                </article>
                <article class="flex flex-col items-center">
                    <img class="h-20 w-max" src="{{ asset('imagenes/reportes/icon-girl.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_ninas }}</p>
                    <p class="font-semibold text-sm">Niñas</p>
                </article>
            </section>



            <p class="w-full text-center mt-4 mb-4 font-semibold">
                Del total de personas en movilidad, se identificó a
                <b>{{ $familias }}</b>
                grupos familiares.
            </p>


            <!-- Grafico -->
            <div class="flex flex-col justify-center w-full rounded-lg pb-3" style=" background-color: #fcf3c2;">
                <p style="color: #8a2e2e; font-size: 20px; " class="font-bold text-center my-3">
                    Nacionalidad
                </p>
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">

                    <div class="flex justify-end">
                        @if ($grafico)
                            {!! $this->chart->render() !!}
                        @endif
                    </div>

                    <div class="grid justify-start items-end" style="padding-bottom: 65px;">
                        <div style="font-size: 16px; color: #583d2b;" class="text-center w-96">
                            <p class="flex flex-col">
                                <span>Durante el mes,</span>
                                <span><b>{{ $migrantesEnTransito }}</b>
                                    {{ $migrantesEnTransito != 1 ? 'personas fueron identificadas como' : 'persona fue identificada como' }}
                                </span>
                                <b>{{ $migrantesEnTransito != 1 ? 'Migrantes en Tránsito' : 'Migrante en Tránsito' }},</b>
                            </p>

                            <p class="flex flex-col">
                                <span>y <b>{{ $migrantesEnProteccion }}</b> con necesidades de</span>
                                <b>Protección Internacional.</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- total -->
            <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                <div class="flex flex-col text-center items-end p-3">
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center"
                            style="font-size: 30px; font-weight: 600; background-color: #ad342b; border-radius: 50%; width: 70px; height: 70px; color: #fffcf6;">
                            {{ $total_personas }}
                        </div>
                        <div class="font-bold mt-2" style="color: #583d2b; font-size: 18px;">
                            <p>Total de personas</p>
                            <p>en condición de movilidad</p>
                            <p>atendidas en {{ $currentYear }}</p>
                        </div>
                    </div>


                </div>
                <div class="p-3">
                    <img width="250px" src=" {{ asset('imagenes/reportes/inmigrante.png') }}" alt="">
                </div>
            </div>
            <div class="flex justify-center items-end mb-2 mt-4">
                <div style="border: 1px solid #fcf3c2; width:60%; background-color: #ece2a6; color: #583d2b; font-size: 12px;"
                    class="pt-2 text-center font-bold">
                    <p class="mb-1">Información extraída de la base de datos del Centro de Atención Cáritas</p>
                </div>
            </div>
        </div>
    </div>


    <style>
        .fondo {
            background-color: #ad342b !important;
        }

        @media print {

            @page {
                background: white !important;
            }

            /* Ocultar todo lo que no esté en la sección de impresión */
            body * {
                visibility: hidden;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact;
            }

            body {
                background: white !important;
            }

            /* Solo mostrar el contenido de print-section */
            .print-section,
            .print-section * {
                visibility: visible;
            }

            /* Asegurar que print-section ocupe toda la página impresa */
            .print-section {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
        }
    </style>

</div>
