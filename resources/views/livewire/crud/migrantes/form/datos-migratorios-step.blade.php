<main class="flex-grow overflow-hidden flex flex-col">

    <section class="flex justify-between my-4 items-center">
        <h2 class="text-lg">
            <strong>Paso 4:</strong> Datos Migratorios de:
            <u>
                {{ session('nombreMigrante') }} ({{ session('identificacion') }})
            </u>
        </h2>
        <livewire:components.forms.steps :currentStep="1" :steps="4">
    </section>

    <article class="flex-grow flex overflow-hidden rounded-lg border-2 border-accent p-6 gap-12">

        {{-- Frontera, asesor migratorio, y estado migratorio --}}
        <section class="w-1/2 h-full">
            <label class="label">
                <span>
                    Seleccione la <strong>Entidad</strong> que lo <strong>guió</strong> al centro:
                </span>
            </label>
            <div class="flex gap-2">
                <select wire:model.live="asesorId"
                    class="select bg-accent w-full
                @error('asesorMigratorio')
                    border-2 border-error-content
                @enderror">
                    @foreach ($asesoresMigratorios as $asesor)
                        <option value="{{ $asesor->id }}">{{ $asesor->asesor_migratorio }}</option>
                    @endforeach
                </select>

                {{-- Botón de añadir asesor migratorio --}}
                <livewire:crud.asesores-migratorios.crear-asesor-migratorio-modal :idModal="'createAsesor-RegMigrante'" />

            </div>

            <label class="label mt-2">
                <span>
                    Seleccione la <strong>Frontera</strong> por la que ingresó al país:
                </span>
            </label>
            <div class="flex gap-2">
                <select wire:model.live="fronteraId"
                    class="select bg-accent w-full
            @error('fronteraIngreso')
                border-2 border-error-content
            @enderror">
                    @foreach ($fronteras as $frontera)
                        <option value="{{ $frontera->id }}"> {{ $frontera->frontera }} </option>
                    @endforeach
                </select>

                {{-- Botón de añadir frontera --}}
                <livewire:crud.fronteras.crear-frontera-modal :idModal="'createFrontera-RegMigrante'" />
            </div>

            <label class="label mt-2">
                <span>
                    Seleccione su <strong>Situación Migratoria</strong>:
                </span>
            </label>
            <div class="flex gap-2">
                <select wire:model.live="situacionId"
                    class="select bg-accent w-full
            @error('situacionEncontrada')
                border-2 border-error-content
            @enderror">
                    @foreach ($situaciones as $situacion)
                        <option value="{{ $situacion->id }}">{{ $situacion->situacion_migratoria }}</option>
                    @endforeach
                </select>

                {{-- Botón de añadir situacion migratoria --}}
                <livewire:crud.situaciones-migratorias.crear-situacion-migratoria-modal :idModal="'createSituacion-RegMigrante'" />
            </div>
        </section>
        <section class="w-1/2 h-full overflow-y-auto">
            <label class="label font-bold">Seleccione los motivos por los que salió del país</label>
            @error('motivosSelected')
                <p class="font-semibold text-error-content mb-4">* Seleccione al menos una opción</p>
            @enderror
            <div class="flex flex-col gap-2">
                @foreach ($motivosSalidaPais as $motivo)
                    <div class="flex gap-1">
                        <input class="checkbox checkbox-sm" type="checkbox" wire:model.live="motivosSelected"
                            value="{{ $motivo->id }}">
                        {{ $motivo->motivo_salida_pais }}
                    </div>
                @endforeach
            </div>

        </section>
    </article>
    <footer class="py-4 mb-0 flex justify-between">
        <livewire:crud.migrantes.listado-migrantes-button />
        <div class="flex gap-4">
            <livewire:components.buttons.next-step-button />
        </div>
    </footer>
</main>