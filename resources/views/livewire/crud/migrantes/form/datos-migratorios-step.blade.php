<main class="flex size-full">

    {{-- Frontera, asesor migratorio, y estado migratorio --}}
    <section class="w-full size-full flex flex-col gap-4 overflow-auto p-6">
        <div class="flex flex-col">
            <label class="py-2 px-1 font-semibold">
                Entidad que lo guió al centro:
            </label>
            <div class="flex gap-2">

                {{-- Aqui comienza el Select --}}
                <div @class([
                    'input input-bordered flex items-center bg-accent pl-3 pe-4 w-full',
                    'border-b-4 border-b-error' => $errors->has('asesorId'),
                ])>
                    <span class="icon-[entypo--address] size-6"></span>
                    <select wire:model="asesorId"
                        class="h-full text-base pl-1 grow bg-accent focus:outline-none border-x-0 rounded-none">
                        <option value="">Seleccione...</option>
                        @foreach ($asesoresMigratorios as $asesor)
                            <option value="{{ $asesor->id }}">{{ $asesor->asesor_migratorio }}</option>
                        @endforeach
                    </select>
                    @error('asesorId')
                        <div class="tooltip tooltip-left tooltip-error flex items-center" data-tip="{{ $message }}">
                            <span class="icon-[bx--error] size-6 text-error ms-2"></span>
                        </div>
                    @enderror
                </div>

                {{-- Botón de añadir asesor migratorio --}}
                <livewire:crud.asesores-migratorios.crear-asesor-migratorio-modal :idModal="'createAsesor-RegMigrante'" :buttonLabel="''" />
            </div>
        </div>

        <div class="flex flex-col">
            <label class="py-2 px-1 font-semibold">
                Frontera por la que ingresó al país:
            </label>
            <div class="flex gap-2">

                {{-- Aqui comienza el Select --}}
                <div @class([
                    'input input-bordered flex items-center bg-accent pl-3 pe-4 w-full',
                    'border-b-4 border-b-error' => $errors->has('fronteraId'),
                ])>
                    <span class="icon-[maki--police] size-6"></span>
                    <select wire:model="fronteraId"
                        class="h-full text-base pl-1 grow bg-accent focus:outline-none border-x-0 rounded-none">
                        <option value="">Seleccione...</option>
                        @foreach ($fronteras as $frontera)
                            <option value="{{ $frontera->id }}"> {{ $frontera->frontera }} </option>
                        @endforeach
                    </select>
                    @error('fronteraId')
                        <div class="tooltip tooltip-left tooltip-error flex items-center" data-tip="{{ $message }}">
                            <span class="icon-[bx--error] size-6 text-error ms-2"></span>
                        </div>
                    @enderror
                </div>

                {{-- Botón de añadir frontera --}}
                <livewire:crud.fronteras.crear-frontera-modal :idModal="'createFrontera-RegMigrante'" :buttonLabel="''" />
            </div>
        </div>

        <div class="flex flex-col">
            <label class="py-2 px-1 font-semibold">
                Situación Migratoria (Perfil de Migrante):
            </label>
            <div class="flex gap-2">

                {{-- Aqui comienza el Select --}}
                <div @class([
                    'input input-bordered flex items-center bg-accent pl-3 pe-4 w-full',
                    'border-b-4 border-b-error' => $errors->has('situacionId'),
                ])>
                    <span class="icon-[material-symbols--travel-explore] size-6"></span>
                    <select wire:model="situacionId"
                        class="h-full text-base pl-1 grow bg-accent focus:outline-none border-x-0 rounded-none">
                        <option value="">Seleccione...</option>
                        @foreach ($situaciones as $situacion)
                            <option value="{{ $situacion->id }}">{{ $situacion->situacion_migratoria }}</option>
                        @endforeach
                    </select>
                    @error('situacionId')
                        <div class="tooltip tooltip-left tooltip-error flex items-center" data-tip="{{ $message }}">
                            <span class="icon-[bx--error] size-6 text-error ms-2"></span>
                        </div>
                    @enderror
                </div>

                {{-- Botón de añadir situacion migratoria --}}
                <livewire:crud.situaciones-migratorias.crear-situacion-migratoria-modal :idModal="'createSituacion-RegMigrante'"
                    :buttonLabel="''" />
            </div>
        </div>
    </section>
</main>
