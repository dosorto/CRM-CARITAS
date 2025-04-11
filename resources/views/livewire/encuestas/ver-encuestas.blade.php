<div class="h-screen w-full flex flex-col bg-base-100">
    <header class="h-14 flex justify-between items-center p-4 shadow-md z-10">
        <h1 class="text-xl font-bold">Encuestas de Satisfacción</h1>
        {{-- <div class="hidden">
            <span class="icon-[fa6-solid--child]"></span>
            <span class="icon-[fa6-solid--child-dress]"></span>
            <span class="icon-[fa-solid--male]"></span>
            <span class="icon-[fa-solid--female]"></span>
        </div> --}}
    </header>

    <div class="flex flex-col justify-between h-full overflow-hidden">
        <main class="h-full grow w-full overflow-auto">

            {{-- Cards de información --}}
            <section class="flex w-full p-4 gap-4">
                <div class="flex py-3 bg-base-200 min-w-40 pl-5 rounded-lg shadow-md items-center w-3/5">
                    <span class="icon-[mingcute--happy-fill] size-8"></span>
                    <div class="flex flex-col ml-3">
                        <span class="text-sm font-semibold">Porcentaje de Satisfacción General:</span>
                        <span class="text-2xl font-semibold">{{ $satisfaccionGeneral }} %</span>
                    </div>
                </div>
                <div class="flex py-3 bg-base-200 w-2/5 min-w-40 pl-5 rounded-lg shadow-md items-center">
                    <span class="icon-[ri--survey-fill] size-8"></span>
                    <div class="flex flex-col ml-3">
                        <span class="text-sm font-semibold">Encuestas totales realizadas:</span>
                        <span class="text-2xl font-semibold">{{ $totalEncuestas }}</span>
                    </div>

                </div>
            </section>

            <section class="flex w-full px-4 gap-4">
                <div class="flex flex-col bg-base-200 min-w-40 rounded-lg shadow-md items-center w-3/5 p-4">
                    <h3 class="text-sm font-semibold pb-3">
                        Porcentaje de satisfacción de cada pregunta
                    </h3>
                    <div class="h-72 w-full rounded-lg overflow-auto">
                        <table class="table table-pin-rows">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th class="bg-accent">Indicador</th>
                                    <th class="bg-accent"># Si</th>
                                    <th class="bg-accent"># No</th>
                                    <th class="bg-accent rounded-tr-lg">Satisfacción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                @foreach ($kpis as $i => $kpi)
                                    <tr class="border-b-2 border-accent">
                                        <th class="flex items-center gap-1.5">
                                            <div class="tooltip tooltip-right tooltip-primary"
                                                data-tip="{{ $kpi->pregunta }}">
                                                <span class="icon-[pajamas--question] size-4 flex items-center"></span>
                                            </div>
                                            <span>
                                                {{ $kpi->kpi }}
                                            </span>
                                        </th>
                                        <td>{{ $kpi->cantidadSi }}</td>
                                        <td>{{ $kpi->cantidadNo }}</td>
                                        <td>{{ $kpi->porcentaje }} %</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex flex-col bg-base-200 min-w-40 rounded-lg items-center shadow-md w-2/5 p-4">
                    <h3 class="text-sm font-semibold pb-3">
                        Comentarios
                    </h3>

                    <section class="flex flex-col text-sm size-full h-72 overflow-auto">

                        @forelse ($comentarios as $id => $comentario)
                            <div class="flex border-2 border-accent w-full rounded-l-lg rounded-r-xl mb-5">
                                <span class="w-full flex items-center p-3">
                                    {{ $comentario->comentario }}
                                </span>
                                <span class="w-36 bg-accent px-3 py-1 flex justify-center items-center rounded-r-lg">
                                    <b>{{ $comentario->fecha }}</b>
                                </span>
                            </div>
                        @empty
                            <div class="size-full flex flex-col justify-center items-center grow">

                                <span class="tooltip tooltip-primary" data-tip="*Sonido de Grillo*">
                                    <span class="icon-[twemoji--cricket] size-10"></span>
                                </span>
                                <span>No hay comentarios...</span>
                            </div>
                        @endforelse
                    </section>
                </div>
            </section>
            {{-- Tabla para las preguntas --}}

        </main>

        {{-- Footer fijo en la parte inferior --}}
        {{-- <footer class="h-auto flex flex-col justify-center text-base-content p-4">
        </footer> --}}
    </div>
</div>
