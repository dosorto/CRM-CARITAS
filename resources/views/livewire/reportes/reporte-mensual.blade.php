<div class="mt-2">
    <div class="p-5 grid gap-6 mb-6 md:grid-cols-2">
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
        <button onclick="window.print()" type="button"
            class="text-white bg-[#ad342b] hover:bg-[#ad342b]/90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
            Imprimir Reporte
        </button>
    </div>
    <div class=" flex justify-center w-full p-4">

        <div class="print-section"
            style="width: 8.5in; height: 11in; background-color: #fffcf6; font-family: Arial, Helvetica, sans-serif;">
            <!-- Logos -->
            <div class="flex w-full justify-center m-2">
                <img class="h-16" src="{{ asset('img/LOGO1.png') }}" alt="">
                <img class="h-16" src="{{ asset('img/LOGO2.png') }}" alt="">
            </div>
            <!-- Ubicacion -->
            <div class="flex justify-center mb-2">
                <div style="width: 70%; font-size: 18px;" class="">
                    <p style="line-height: 0.2; color:#583d2b;">
                    <p style="color: #583d2b; font-weight: 700; ">
                        Centro de Atención Cáritas "Mons. Guido Charbonneau"
                    </p>
                    <p style="line-height: 0.8; color:#583d2b;">
                        Bo. El Hospital, Choluteca, Choluteca, Honduras
                    </p>
                    </p>
                    <span style="color: #583d2b; font-weight: 700; font-family: Arial, Helvetica, sans-serif;">
                        {{ $nombreMes }} {{ $numeroDia }}

                    </span>
                </div>
            </div>

            <!-- Recuadro rojo -->
            <div class="flex items-center justify-center w-full">
                <div style="width: 80%; border-color: #8a2e2e; color: white; "
                    class="fondo border flex items-center p-2">
                    <img style="filter: contrast(150%) brightness(90%) drop-shadow(0 0 5px rgba(0, 0, 0, 0.8));"
                        class="h-14" src="{{ asset('imagenes/reportes/icon-corazon.png') }}" alt="">
                    <div class="text-center" style="font-size: 14px;">
                        <p>
                            Servicios que se brindan de menera gratuita y temporal <span class="font-semibold">
                                hospedaje,</span>
                        </p>
                        <p class="font-semibold">
                            alimentación, agua, asesoría legal, apoyo psicosocial, lavandería, internet y ropa
                        </p>

                    </div>
                </div>
            </div>
            <!-- personas -->
            <div class="flex items-center justify-center w-full pt-3">
                <div style="width: 80%;" class="grid grid-cols-3 md:grid-cols-3 gap-4">
                    <div class="col-span-1  flex flex-col">
                        <div class="flex justify-center">
                            <img class="h-28" src="{{ asset('imagenes/reportes/family.png') }}" alt="">
                        </div>
                        <p style="color: #583d2b; font-size: 24px;" class="flex justify-center font-extrabold">
                            {{ $cantidad_migrantes }}
                        </p>
                        <div style="color: #583d2b;" class="flex justify-center font-semibold text-center">
                            personas migrantes y refugiadas
                        </div>

                    </div>

                    <div class="col-span-2  grid grid-cols-4 md:grid-cols-4 gap-4 items-end pb-5">
                        <div style="display: flex; align-items: end;" class="flex flex-col items-end">
                            <div class="text-center w-full font-extrabold" style="font-size: 20px; color: #583d2b;">
                                {{ $cantidad_hombres }}
                            </div>
                            <div class="text-center w-full mb-2" style="color:#583d2b;">
                                hombres
                            </div>
                            <div class="flex justify-center">
                                <img src="{{ asset('imagenes/reportes/icon-man.png') }}" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="text-center w-full font-extrabold" style="font-size: 20px; color: #583d2b;">
                                {{ $cantidad_mujeres }}

                            </div>
                            <div class="text-center w-full mb-2" style="color:#583d2b;">
                                mujeres
                            </div>
                            <div class="flex justify-center">
                                <img src="{{ asset('imagenes/reportes/icon-woman.png') }}" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="text-center w-full font-extrabold" style="font-size: 20px; color: #583d2b;">
                                {{ $cantidad_ninos }}
                            </div>
                            <div class="text-center w-full mb-2" style="color:#583d2b;">
                                niños
                            </div>
                            <div class="flex justify-center">
                                <img src="{{ asset('imagenes/reportes/icon-boy.png') }}" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="text-center w-full font-extrabold" style="font-size: 20px; color: #583d2b;">
                                {{ $cantidad_ninas }}

                            </div>
                            <div class="text-center w-full mb-2" style="color:#583d2b;">
                                niñas
                            </div>
                            <div class="flex justify-center">
                                <img src="{{ asset('imagenes/reportes/icon-girl.png') }}" alt="">
                            </div>
                        </div>
                    </div>


                </div>


            </div>
            <div class="w-full" style="padding-left: 5em; margin-top: 4px; margin-bottom: 7px;">
                {{-- <p style="font-size: 13px; color: #583d2b;">Del total de personas en movilidad, se identificó a 10 grupos familiares.</p> --}}
            </div>

            <!-- Grafico -->
            <div class="flex flex-col justify-center w-full" style=" background-color: #fcf3c2;">
                <p style="color: #8a2e2e; font-size: 20px; " class="font-bold text-center">
                    Nacionalidad
                </p>
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">

                    <div class="flex justify-end">
                        @if ($grafico)
                            {{-- <x-chartjs-component :chart="$chart" /> --}}
                            {!! $this->chart->render() !!}
                        @endif
                    </div>

                    <div class="grid justify-start items-end" style="padding-bottom: 65px;">
                        <div style="font-size: 16px; color: #583d2b;" class="text-center w-96">
                            <p>Durante el mes</p>
                            <span class="font-bold" style="font-size: 17;"> 3 </span> personas fueron identificadas
                            como
                            <p style="font-size: 17px;" class="font-bold">Migrantes en tránsito</p>
                            <p>y <span style="font-size: 17px;" class="font-bold"> 2 con necesidades de
                                    protección</span></p>
                            <p style="font-size: 17px;" class="font-bold">internacional.</p>
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
                <div style="border: 1px solid #fcf3c2; width:28%; background-color: #ece2a6; color: #583d2b; font-size: 12px;"
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

            /* Ocultar todo lo que no esté en la sección de impresión */
            body * {
                visibility: hidden;
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
