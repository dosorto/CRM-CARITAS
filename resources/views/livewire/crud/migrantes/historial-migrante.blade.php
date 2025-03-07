<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b-2 border-accent">
        <h1 class="text-2xl font-bold">Historial Completo</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <main class="h-full flex grow overflow-hidden w-full p-4">
        {{-- Sección de expedientes --}}
        <section class="w-3/5 pr-4 flex flex-col overflow-hidden">

            {{-- Seccion de expedientes --}}
            <div class="w-full h-1/2 flex flex-col">
                <h4 class="font-semibold text-xl my-4">
                    Expedientes:
                </h4>

                <div class="w-full flex pb-4 overflow-auto gap-6">
                    @if ($expedientes->isEmpty())
                        Esta persona no tiene ningún expediente registrado...
                    @else
                        @foreach ($expedientes as $expediente)
                            <div class="size-max">
                                <article class="card card-compact bg-accent w-48 shadow-md">
                                    <div class="card-body text-center flex items-center size-full">
                                        <h2 class="card-title">
                                            {{ $expediente->created_at->format('d / m / Y') }}
                                        </h2>

                                        <livewire:crud.migrantes.info-expediente-modal idModal="infoExpedienteHistorial"
                                            itemId="{{ $expediente->id }}">

                                            {{-- <button class="btn btn-neutral text-base-content w-full">Detalles</button> --}}

                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Seccion de actas de entrega --}}
            <div class="w-full h-1/2 flex flex-col border-t-2 border-accent">
                <h4 class="font-semibold text-xl my-4">
                    Actas de Artículos Entregados:
                </h4>
                <div class="w-full flex pb-4 overflow-auto gap-6">
                    @if ($actasEntrega->isEmpty())
                        Esta persona no recibió ningún producto mediante un Acta de Entrega...
                    @else
                        @foreach ($actasEntrega as $acta)
                            <div class="size-max">
                                <article class="card card-compact bg-accent w-48 shadow-md">
                                    <div class="card-body text-center flex items-center size-full">
                                        <h2 class="card-title">{{ $acta->created_at->format('d / m / Y') }}</h2>


                                        <livewire:actas.actas-entrega.info-acta-entrega-modal
                                            idModal="infoActaEntregaHistorial" itemId="{{ $acta->id }}">

                                            {{-- <button class="btn btn-neutral text-base-content w-full">Detalles</button> --}}
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        {{-- Sección de datos personales --}}
        <section class="w-2/5 pl-6 border-l-2 border-accent overflow-y-auto flex flex-col">
            <p class="text-xl font-bold text-center mt-4">Datos Personales</p>

            <div class="gap-2 flex flex-col w-full h-max mt-6">
                <span>
                    <strong>Nombre: </strong>
                    {{ $migrante->primer_nombre .
                        ($migrante->segundo_nombre ? ' ' . $migrante->segundo_nombre : '') .
                        ' ' .
                        $migrante->primer_apellido .
                        ($migrante->segundo_apellido ? ' ' . $migrante->segundo_apellido : '') }}
                </span>
                <span>
                    <strong>Número de Identificación: </strong>
                    {{ $migrante->numero_identificacion ?? 'No disponible' }}
                </span>
                <span>
                    <strong>Sexo: </strong>
                    {{ $migrante->sexo }}
                </span>
                <span>
                    <strong>Estado Civil: </strong>
                    {{ $migrante->estado_civil }}
                </span>
                <span>
                    <strong>Fecha de Nacimiento: </strong>
                    {{ $migrante->fecha_nacimiento ? \Carbon\Carbon::parse($migrante->fecha_nacimiento)->format('d / m / Y') : 'No disponible' }}

                </span>
                <span>
                    <strong>País de Origen: </strong>
                    {{ $migrante->pais?->nombre ?? 'No especificado' }}
                </span>
                <span>
                    <strong>LGBT: </strong>
                    {{ $migrante->es_lgbt ? 'Sí' : 'No' }}
                </span>
            </div>


        </section>
    </main>

    {{-- Footer fijo en la parte inferior --}}
    <footer class="h-auto flex flex-col justify-center bg-neutral text-base-content p-4 border-t-2 border-accent">
        {{-- Pie de páginaaa --}}
    </footer>
</div>
