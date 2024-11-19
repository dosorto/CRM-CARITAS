<main class="flex-grow overflow-hidden flex flex-col">

    <section class="flex justify-between my-4 items-center">
        <h2 class="text-lg">
            <strong>Paso 5:</strong> Situación Migratoria de:
            <u>
                {{ session('nombreMigrante') }} ({{ session('identificacion') }})
            </u>
        </h2>
        <livewire:components.forms.steps :currentStep="1" :steps="4">
    </section>

    <article class="flex-grow flex-col flex overflow-y-auto rounded-lg border-2 border-accent">

        <div class="w-full flex flex-grow overflow-y-auto p-6">

            {{-- Frontera, asesor migratorio, y estado migratorio --}}
            <section class="w-1/2 h-full border-r border-accent mr-8 pr-4">
                <label class="label">
                    <strong>Seleccione las Necesidades que Presenta:</strong>
                </label>
                @error('necesidadesSelected')
                    <p class="font-semibold text-error-content mb-4">* Seleccione al menos una</p>
                @enderror
                <div class="flex flex-col gap-2">
                    @foreach ($necesidades as $necesidad)
                        <div class="flex gap-1 text-wrap">
                            <input class="checkbox checkbox-sm" type="checkbox" wire:model.live="necesidadesSelected"
                                value="{{ $necesidad->id }}">
                            {{ $necesidad->necesidad }}
                        </div>
                    @endforeach
                </div>

            </section>

            {{-- <section class="w-1/3 h-full border-r border-accent mr-8 pr-4">
                <label class="label">
                    <strong>Situación en la que se encuentra:</strong>
                </label>
                @error('situacionesSelected')
                    <p class="font-semibold text-error-content mb-4">* Seleccione al menos una</p>
                @enderror
                <div class="flex flex-col gap-2">
                    @foreach ($situaciones as $situacion)
                        <div class="flex gap-1 text-wrap">
                            <input class="checkbox checkbox-sm" type="checkbox" wire:model.live="situacionesSelected"
                                value="{{ $situacion->id }}">
                            {{ $situacion->situacion_migratoria }}
                        </div>
                    @endforeach
                </div>

            </section> --}}
            <section class="w-1/2 h-full">
                <label class="label">
                    <strong>Seleccione Discapacidades que Presenta:</strong>
                </label>
                <div class="flex flex-col gap-2">
                    @foreach ($discapacidades as $discapacidad)
                        <div class="flex gap-1">
                            <input class="checkbox checkbox-sm" type="checkbox" wire:model.live="discapacidadesSelected"
                                value="{{ $discapacidad->id }}">
                            {{ $discapacidad->discapacidad }}
                        </div>
                    @endforeach
                </div>

            </section>

        </div>
        <div class="h-max w-full items-center bg-accent px-6 pb-6 pt-2 mt-4">
            <label class="label">
                Observación:
            </label>
            <input wire:model.live="observacion" type="text" class="input w-full bg-neutral"
                placeholder="Escribir aquí...">
        </div>
    </article>
    <footer class="py-4 mb-0 flex justify-between">
        <livewire:crud.migrantes.listado-migrantes-button />
        <div class="flex gap-4">
            <livewire:components.buttons.previous-step-button />
            {{-- <button class="btn btn-accent text-base-content">
                <span class="icon-[mingcute--user-info-fill] size-5"></span>
                Ver Datos Personales
            </button> --}}
            {{-- <livewire:components.buttons.next-step-button /> --}}



            <!-- The button to open modal -->
            <label for="my_modal_6" class="btn btn-info text-base-content">
                <span class="icon-[lucide--save] size-5"></span>
                Guardar Expediente
            </label>


        </div>
    </footer>













    {{-- Modal de confirmacion --}}

    <input type="checkbox" id="my_modal_6" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 max-w-5xl bg-neutral">

            <div class="flex flex-col items-center text-center mb-6">
                <h3 class="text-lg font-bold">Se Guardarán los Datos Ingresados Para un Nuevo Expediente de:</h3>
                <h5 class="text-md font-semibold mt-4">{{ session('nombreMigrante') }} - {{ session('identificacion') }}
                </h5>
                <h5 class="text-xl font-semibold mt-4">¿Está seguro?</h5>
            </div>
            {{-- 
            <p>
                {!! nl2br(e(print_r(session()->all(), true))) !!}
            </p> --}}

            <div class="modal-action">

                <div class="flex size-full justify-between">
                    <div class="flex flex-col text-error font-semibold">
                        @error('necesidadesSelected')
                            <p>* Hay campos sin seleccionar.</p>
                            <p>Seleccionelos e Inténtelo de Nuevo.</p>
                        @enderror
                    </div>

                    <div class="flex w-max gap-2">
                        <button wire:click="saveExpediente" class="btn btn-success text-base-content">
                            <span class="icon-[fa-solid--check] size-6"></span>
                            Confirmar
                        </button>
                        <label for="my_modal_6" class="btn btn-error text-base-content">Cancelar</label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
