<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-neutral text-base-content w-max gap-2">
        <span class="icon-[flowbite--info-circle-solid] size-4"></span>
        Detalles
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 h-max max-w-5xl bg-neutral border-2 border-accent">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-4">Expediente</h3>

            <div class="w-full flex items-center justify-center gap-24">
                <h3 class="text-lg text-center mb-5"> <strong>Fecha de Ingreso: </strong>
                    {{ $item->created_at->format('d / m / Y') }} </h3>
                <h3 class="text-lg text-center mb-5"> <strong>Fecha de Salida: </strong>
                    @if ($item->fecha_salida)
                        {{ \Carbon\Carbon::parse($item->fecha_salida)->format('d / m / Y') }}
                    @else
                        -- / -- / ----
                    @endif
                </h3>
            </div>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full text-base">

                <div class="flex w-full gap-16">
                    <div class="flex flex-col space-y-2 w-1/3">
                        <div class="flex justify-between">
                            <span>¿Recibió Atención Psicológica?</span>
                            <strong>{{ $item->atencion_psicologica == 1 ? 'Si' : 'No' }}</strong>
                        </div>
                        <div class="flex justify-between">
                            <span>¿Recibió Asesoría Psicológica?</span>
                            <strong>{{ $item->asesoria_psicologica == 1 ? 'Si' : 'No' }}</strong>
                        </div>
                        <div class="flex justify-between">
                            <span>¿Recibió Atención Legal?</span>
                            <strong>{{ $item->atencion_legal == 1 ? 'Si' : 'No' }}</strong>
                        </div>
                        <div class="flex justify-between">
                            <span>¿Recibió Asesoría Psicosocial?</span>
                            <strong>{{ $item->asesoria_psicosocial == 1 ? 'Si' : 'No' }}</strong>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-2 w-2/3 pl-8 border-l-2 border-accent items-start justify-start">
                        <div class="flex gap-2">
                            <span class="font-bold">Situación Migratoria:</span>
                            <p>{{ $item->situacionMigratoria->situacion_migratoria }}</p>
                        </div>
                        <div class="flex gap-2">
                            <span class="font-bold">Frontera por la que Ingresó:</span>
                            <p>{{ $item->frontera->frontera }}</p>
                        </div>
                        <div class="flex gap-2">
                            <span class="font-bold">Asesor Migrartoio:</span>
                            <p>{{ $item->asesorMigratorio->asesor_migratorio }}</p>
                        </div>
                        <div class="flex gap-2">
                            <span class="font-bold">Observaciones:</span>
                            <p>{{ $item->observacion }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col h-max w-full justify-start mt-12 text-start gap-4">
                    <span>
                        <strong>Necesidades: </strong>
                        {{ $item->necesidades->pluck('necesidad')->implode(', ') }}
                    </span>
                    <span>
                        <strong>Motivos de Salida del País: </strong>
                        {{ $item->motivosSalidaPais->pluck('motivo_salida_pais')->implode(', ') }}
                    </span>
                    <span>
                        <strong>Discapacidades que Presenta: </strong>
                        {{ $item->discapacidades->pluck('discapacidad')->implode(', ') }}
                    </span>

                </div>
            </main>

            <div class="modal-action">
                <button class="btn btn-success text-base-content" wire:click="imprimir({{ $item->id }})">
                    <span class="icon-[material-symbols--print] size-6"></span>
                    Imprimir
                </button>
                <label for="{{ $idModal }}"
                    class="btn btn-accent text-base-content">Cerrar</label>
            </div>
        </div>
    </div>
</div
