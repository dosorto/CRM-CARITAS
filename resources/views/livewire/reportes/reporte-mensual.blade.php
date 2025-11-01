<div class="h-screen w-full flex flex-col bg-base-100">
    <header class="h-max flex justify-between items-center py-3 px-4 shadow-md z-10">
        <h1 class="text-xl font-bold">Reporte de Migrantes</h1>
        {{-- Fechas --}}
        <div class="flex items-center font-semibold gap-2">
            <span>Desde</span>
            <input wire:model.live="fecha_inicio" type="date" class="input input-sm input-accent bg-accent" required />
            <span>Hasta</span>
            <input wire:model.live="fecha_final" type="date" class="input input-sm input-accent bg-accent" required />
        </div>
    </header>

    <main class="flex flex-col items-center h-full overflow-auto">


        <div class="p-10 mt-10 size-max shadow-lg border-2 border-accent rounded-lg bg-white">
            <article
                class="prose max-w-none w-[216mm] h-[279mm] max-h-none flex flex-col text-gray-800 bg-white border-none">
                <!-- Logos -->
                <header class="relative flex justify-center min-h-[100px]">
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
                <div class="flex items-center justify-center w-full mt-4">
                    <div style="width: 90%; border-color: #ad342b; color: white;"
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
                    <div class="flex flex-col items-center">
                        <img class="h-[4.5rem]" src="{{ asset('imagenes/reportes/family.png') }}" alt="">
                        <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_migrantes }}
                        </p>
                        <p class="font-semibold text-sm">Personas refugiadas</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img class="h-[4.5rem]" src="{{ asset('imagenes/reportes/icon-man.png') }}" alt="">
                        <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_hombres }}
                        </p>
                        <p class="font-semibold text-sm">Hombres</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img class="h-[4.5rem] w-max" src="{{ asset('imagenes/reportes/icon-woman.png') }}"
                            alt="">
                        <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_mujeres }}
                        </p>
                        <p class="font-semibold text-sm">Mujeres</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img class="h-[4.5rem] w-max" src="{{ asset('imagenes/reportes/icon-boy.png') }}"
                            alt="">
                        <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_ninos }}
                        </p>
                        <p class="font-semibold text-sm">Niños</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img class="h-[4.5rem] w-max" src="{{ asset('imagenes/reportes/icon-girl.png') }}"
                            alt="">
                        <p style="color: #583d2b;" class="text-center font-extrabold text-2xl">{{ $cantidad_ninas }}
                        </p>
                        <p class="font-semibold text-sm">Niñas</p>
                    </div>
                </section>


                <div class="flex w-full justify-center">
                    <div class="flex gap-2 badge px-6 py-4 bg-[#8a2e2e] my-4 border text-white">
                        <span>Del total de personas en movilidad, se identificó a</span>
                        <b>{{ $familias }}</b>
                        <span>grupos familiares.</span>
                    </div>
                </div>


                <!-- Graficos -->
                <div class="flex w-full rounded-xl p-4" style=" background-color: #fcf3c2;">

                    <div class="flex flex-col w-3/5">
                        <h3 class="text-[#8a2e2e] font-bold text-center mb-2">
                            Nacionalidades
                        </h3>
                        <div class="size-full pr-6">
                            @if ($grafico)
                                {!! $this->chart->render() !!}
                            @endif
                        </div>
                    </div>

                    <div class="w-2/5 flex flex-col justify-center text-[#583d2b] pl-3">

                        @if (!empty($situacionesMigratorias))

                            <span class="text-center mb-4">
                                Entre las fechas: <br>
                                <b>{{ \Carbon\Carbon::parse($fecha_inicio)->format('d/m/Y') }}</b> y
                                <b>{{ \Carbon\Carbon::parse($fecha_final)->format('d/m/Y') }}</b>, <br>
                                se identificaron los siguientes <br>
                                perfiles de migrantes:
                            </span>

                            <table class="table table-xs">
                                <thead class="border-b-2 border-[#ad342b]">
                                    <th class="text-xs rounded-tl-lg bg-[#ad342b] text-white">Perfil</th>
                                    <th class="text-xs rounded-tr-lg bg-[#ad342b] text-white text-center">Migrantes</th>
                                </thead>

                                <tbody>
                                    @foreach ($situacionesMigratorias as $situacion => $cantidad)
                                        <tr class="border-b border-[#ad342b] border-opacity-40">
                                            <td>{{ $situacion }}</td>
                                            <td class="text-center">{{ $cantidad }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="font-semibold">Total</td>
                                        <td class="font-semibold text-center">
                                            {{ array_sum($situacionesMigratorias) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <span class="text-center mt-2 font-bold">(Seleccione un rango de fechas)</span>
                        @endif
                    </div>
                </div>
                <!-- total -->

                <div class="flex items-center justify-center my-6 gap-8">
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
                <div class="flex justify-center items-end">
                    <div style="background-color: #ece2a6; color: #583d2b;"
                        class="py-2 px-4 text-center font-bold rounded-full w-max text-sm flex gap-2 items-center">
                        <p>Información obtenida del sistema ÉXODO del Centro de Atención Cáritas.</p>
                        {{-- <img src="{{ asset('img/LOGO1.png') }}" alt="" class="h-8"> --}}
                        {{-- <p>del Centro de Atención Cáritas</p> --}}
                    </div>
                </div>
            </article>
        </div>
        <button class="btn btn-info my-8 flex-nowrap w-max" onclick="window.print();">
            <span class="icon-[material-symbols--print] size-6"></span>
            Imprimir
        </button>
    </main>



    <style>
        .fondo {
            background-color: #ad342b !important;
        }

        article {
            transform-origin: top left;
            min-width: 216mm !important;
            width: 216mm !important;
            box-sizing: border-box !important;
        }

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
