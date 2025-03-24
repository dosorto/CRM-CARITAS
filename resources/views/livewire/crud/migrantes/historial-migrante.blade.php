<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4">
        <h1 class="text-xl font-bold">Historial de:
            {{ $migrante->primer_nombre . ' ' . $migrante->primer_apellido }} - {{$migrante->numero_identificacion}}</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <main class="h-full flex grow overflow-hidden w-full border-y-2 border-accent">

        {{-- Sección de datos migratorios --}}
        <section class="overflow-auto flex flex-col w-3/5 p-4">

            <div class="flex pb-4 border-b-2 border-accent rounded-box">
                <span class="w-1/2 text-center border-r border-accent"><b>Fecha de Ingreso:</b>
                    {{ \Carbon\Carbon::parse($expediente->fecha_ingreso)->format('d / m / Y') }}</span>
                <span class="w-1/2 text-center border-l border-accent"><b>Fecha de Salida:</b>
                    {{ $expediente->fecha_salida ? \Carbon\Carbon::parse($expediente->fecha_ingreso)->format('d / m / Y') : ' -- / -- / ----' }}</span>
            </div>

            <div class="flex flex-col gap-2 pt-4">
                <span><b>Situación Migratoria:</b> {{ $expediente->situacionMigratoria->situacion_migratoria }}</span>
                <span><b>Frontera por la que Ingresó:</b> {{ $expediente->frontera->frontera }}</span>
                <span><b>Entidad que lo guió al centro:</b> {{ $expediente->asesorMigratorio->asesor_migratorio }}</span>
                <span><b>Necesidades:</b> {{ $necesidades }}.</span>
                <span><b>Motivos de salida de su país:</b> {{ $motivos }}.</span>
                <span><b>Discapacidades:</b> {{ $discapacidades }}.</span>
                <span><b>Observaciones:</b> {{ $expediente->observacion }}</span>
            </div>
        </section>

        {{-- Sección de preguntas de Asesoría --}}
        <section class="overflow-auto flex flex-col w-2/5 px-4 py-2 border-l-2 border-accent">
            {{-- Preguntas --}}
            @foreach ($preguntas as $nombre => $pregunta)
                <div @class([
                    'border-b-2 border-dotted flex justify-between gap-2 py-2 px-2 mb-4',
                    'border-success' => $this->{$nombre},
                    'border-primary' => !$this->{$nombre},
                ])>
                    <label class="font-semibold">{{ $pregunta }}</label>


                    <div data-tip="No tiene permisos" @class([
                        'h-full flex items-center gap-2',
                        'tooltip tooltip-left tooltip-primary' => !auth()->user()->can('editar-registros-de-asesoria'),
                    ])>
                        <span class="font-semibold">
                            {{ $this->{$nombre} ? 'Sí' : 'No' }}
                        </span>

                        <input type="checkbox" @class([
                            'toggle',
                            'toggle-success' => $this->{$nombre},
                            'bg-primary hover:bg-primary' => !$this->{$nombre},
                        ]) wire:model.live="{{ $nombre }}"
                            @disabled(!auth()->user()->can('editar-registros-de-asesoria')) @checked($this->{$nombre}) />
                    </div>

                </div>
            @endforeach
        </section>
    </main>

    {{-- Footer fijo en la parte inferior --}}
    <footer class="h-max flex p-4 gap-4">
        {{-- Botón de Datos Personales --}}
        <livewire:crud.migrantes.info-migrante-modal iconSize=5 btnSize='' label='Datos Personales'
            idModal="infoMigranteHistorial" personaId="{{ $migrante->id }}" />

        {{-- Botón de Faltas Disciplinarias --}}
        <livewire:crud.migrantes.salida-migrante.ver-faltas-expediente migranteId="{{ $migrante->id }}" />

        <button class="btn btn-info">
            <span class="icon-[fe--document] size-6"></span>
            Actas de Entrega
        </button>
    </footer>
</div>
