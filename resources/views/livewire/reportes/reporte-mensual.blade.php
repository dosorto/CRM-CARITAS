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
            <header class="relative flex justify-center min-h-[100px] mt-4 mb-2">
                <!-- Logo superior izquierdo -->
                <img src="/img/logo-centro.jpg" class="absolute left-2 top-0 h-20" alt="Logo izquierdo">
                <!-- Logo superior derecho -->
                <img src="/img/LOGO2.png" class="absolute right-4 top-4 h-12 alt="Logo derecho">
                <!-- Título -->
                <div class="flex flex-col justify-center mr-20">
                    <h2 class="text-2xl font-bold text-center mb-0 text-gray-900" style="font-size: 18px;">
                        Centro de Atención Cáritas "Mons. Guido Charbonneau"</h2>
                    <h3 class="text-lg font-semibold text-center mb-0 text-gray-700" style="font-size: 16px;">
                        Bo. El Hospital, Choluteca, Choluteca, Honduras</h3>
                    <h4 class="text-center text-gray-800" style="font-size: 16px;">
                        {{ $numeroDia }} de {{ $nombreMes }} del {{ $currentYear }}
                    </h4>
                </div>
            </header>

            <!-- Recuadro rojo -->
            <div class="flex items-center justify-center w-full">
                <div style="width: 90%; border-color: #8a2e2e; color: white;"
                    class="fondo border justify-center flex items-center p-2 rounded-lg">
                    <img style="" class="h-14 mr-2" src="{{ asset('imagenes/reportes/icon-corazon.png') }}"
                        alt="">
                    <div class="text-center" style="font-size: 14px;">
                        <p>
                            Servicios que se brindan de menera gratuita y temporal:
                        </p>
                        <p class="font-semibold">
                            Hospedaje, alimentación, agua, asesoría legal, apoyo psicosocial, lavandería, internet y
                            ropa
                        </p>

                    </div>
                </div>
            </div>


            {{-- Personas y Familias --}}
            <section class="flex mt-6 justify-center gap-12">
                <article class="flex flex-col items-center">
                    <img class="h-[4.5rem]" src="{{ asset('imagenes/reportes/family.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_migrantes }}</p>
                    <p class="font-semibold text-sm">Personas refugiadas</p>
                </article>
                <article class="flex flex-col items-center">
                    <img class="h-[4.5rem]" src="{{ asset('imagenes/reportes/icon-man.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_hombres }}</p>
                    <p class="font-semibold text-sm">Hombres</p>
                </article>
                <article class="flex flex-col items-center">
                    <img class="h-[4.5rem] w-max" src="{{ asset('imagenes/reportes/icon-woman.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_mujeres }}</p>
                    <p class="font-semibold text-sm">Mujeres</p>
                </article>
                <article class="flex flex-col items-center">
                    <img class="h-[4.5rem] w-max" src="{{ asset('imagenes/reportes/icon-boy.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_ninos }}</p>
                    <p class="font-semibold text-sm">Niños</p>
                </article>
                <article class="flex flex-col items-center">
                    <img class="h-[4.5rem] w-max" src="{{ asset('imagenes/reportes/icon-girl.png') }}" alt="">
                    <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_ninas }}</p>
                    <p class="font-semibold text-sm">Niñas</p>
                </article>
            </section>



            <p class="w-full text-sm text-center mt-4 mb-4">
                Del total de personas en movilidad, se identificó a
                <b>{{ $familias }}</b>
                grupos familiares.
            </p>


            <!-- Graficos -->
            <div class="flex w-full rounded-xl p-4" style=" background-color: #fcf3c2;">

                <div class="flex flex-col w-3/5">
                    <h3 class="text-[#8a2e2e] font-bold text-center mb-2">
                        Nacionalidades
                    </h3>
                    <div class="size-full pr-3">
                        @if ($grafico)
                            {!! $this->chart->render() !!}
                        @endif
                    </div>
                </div>

                <div class="w-2/5 flex flex-col justify-center text-[#583d2b] pl-3">

                    @if (!empty($situacionesMigratorias))

                        <span class="font-semibold text-center mb-4">
                            Durante el mes, se identificaron los siguientes perfiles de Migrantes:
                        </span>

                        <table class="table table-xs">
                            <thead class="border-b-2 border-[#8a2e2e]">
                                <th class="text-xs rounded-tl-lg bg-[#8a2e2e] text-white">Perfil</th>
                                <th class="text-xs rounded-tr-lg bg-[#8a2e2e] text-white text-center">Total</th>
                            </thead>

                            <tbody>
                                @foreach ($situacionesMigratorias as $situacion => $cantidad)
                                    <tr class="border-b border-[#8a2e2e] border-opacity-40">
                                        <td>{{ $situacion }}</td>
                                        <td class="text-center">{{ $cantidad }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <span class="text-center mt-2 font-bold">(Seleccione un rango de fechas)</span>
                    @endif
                </div>
            </div>
            <!-- total -->

            <div class="flex items-center justify-center mt-3">
                <div class="flex flex-col items-center">
                    <div class="rounded-full w-max bg-primary text-white py-2 px-4 font-bold text-xl min-w-11">
                        {{ $total_personas }}
                    </div>
                    <div class="font-bold mt-2 text-base text-center" style="color: #583d2b;">
                        <p>Total de personas en condición de movilidad</p>
                        <p>atendidas en {{ $currentYear }}</p>
                    </div>
                </div>
                <img width="200px" src=" {{ asset('imagenes/reportes/inmigrante.png') }}" alt="">
            </div>
            <div class="flex justify-center items-end mb-2 mt-4">
                <div style="background-color: #ece2a6; color: #583d2b; font-size: 12px;"
                    class="py-2 text-center font-bold rounded w-3/5">
                    <p>Información extraída de la base de datos del Centro de Atención Cáritas</p>
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
