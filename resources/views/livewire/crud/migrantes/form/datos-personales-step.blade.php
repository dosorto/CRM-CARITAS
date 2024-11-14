<main class="flex-grow overflow-hidden flex flex-col">

    <section class="flex justify-between my-4 items-center">
        <h2 class="text-lg">
            <strong>Paso 2: </strong>Datos Personales
        </h2>
        <livewire:components.forms.steps :currentStep="2" :steps="4">
    </section>

    <section class="flex flex-grow flex-col overflow-y-auto rounded-lg border-2 border-accent p-6">
        <h2 class="text-center mb-6 text-lg">
            <strong>Nuevo registro para el Número de Identificación: </strong> {{ session('datosPersonales')['identificacion'] }}
        </h2>

        {{-- Nombres y Apellidos --}}
        <div class="flex gap-8 mb-5">
            <div class="flex flex-col w-1/2">
                <label>Nombres </label>
                <input wire:model="nombres" type="text" placeholder="Escribir aquí..."
                    class="input input-bordered bg-accent
                    @error('nombres')
                        border-2 border-red-500
                    @enderror">
            </div>
            <div class="flex flex-col w-1/2">
                <label>Apellidos </label>
                <input wire:model="apellidos" type="text" placeholder="Escribir aquí..."
                    class="input input-bordered bg-accent
                    @error('apellidos')
                        border-2 border-red-500
                    @enderror">
            </div>
        </div>

        {{-- Estado Civil, Fecha de Nacimiento, Sexo --}}
        <div class="flex gap-8 mb-5">
            <div class="flex flex-col w-1/3">
                <label>Estado Civil </label>
                <select wire:model="estadoCivil"
                    class="select select-bordered bg-accent text-base-content text-md
                    @error('estadoCivil')
                        border-2 border-red-500
                    @enderror">
                    <option value="">Seleccione...</option>
                    <option>Casado/a</option>
                    <option>Soltero/a</option>
                    <option>Divorciado/a</option>
                    <option>Viudo/a</option>
                    <option>Unión Libre</option>
                </select>
            </div>
            <div class="flex flex-col w-1/3">
                <label>Fecha de Nacimiento</label>
                <input wire:model="fechaNacimiento" placeholder="Escribir aquí..." type="date"
                    class="input input-bordered bg-accent
                    @error('fechaNacimiento')
                        border-2 border-red-500
                    @enderror">
            </div>
            <div class="flex flex-col w-1/3">
                <label>Sexo </label>
                <div class="flex gap-2 h-full items-center">

                    <label>M</label>
                    <input wire:model="sexo" value="M" type="radio"
                        class="radio radio-sm border-2
                        @error('sexo')
                            border-red-500
                        @enderror"
                        name="sex">

                    <label class="ml-3">F</label>
                    <input wire:model="sexo" value="F" type="radio"
                        class="radio radio-sm border-2
                        @error('sexo')
                            border-red-500
                        @enderror"
                        name="sex">

                </div>
            </div>
        </div>


        {{-- Tipo de Identificación, Pais, Es LGBT --}}
        <div class="flex gap-8 mb-5">
            <div class="flex flex-col w-1/3">
                <label>Tipo de Identificación </label>
                <select wire:model="tipoIdentificacion"
                    class="select select-bordered bg-accent text-base-content text-md
                        @error('tipoIdentificacion')
                            border-2 border-red-500
                        @enderror">
                    <option value="">Seleccione...</option>
                    <option>DNI</option>
                    <option>Pasaporte</option>
                </select>

            </div>
            <div class="flex flex-col w-1/3">
                <label>País de Origen</label>
                <select wire:model="idPais"
                    class="select select-bordered bg-accent text-base-content text-md
                    @error('idPais')
                        border-2 border-red-500
                    @enderror">
                    <option value="">Seleccione...</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}">{{ $pais->nombre_pais }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col w-1/3">
                <label>¿Es LGBT? </label>
                <div class="flex gap-2 h-full items-center">

                    <label>Si</label>
                    <input wire:model="esLGBT" value="1" type="radio"
                        class="radio radio-sm border-2
                        @error('esLGBT')
                            border-red-500
                        @enderror"
                        name="esLGBT">

                    <label class="ml-3">No</label>
                    <input wire:model="esLGBT" value="0" type="radio" class="radio radio-sm border-2 
                        @error('esLGBT')
                            border-red-500
                        @enderror"
                        name="esLGBT" checked>

                </div>
            </div>
        </div>

    </section>

    <footer class="py-4 mb-0 flex justify-between">
        <livewire:crud.migrantes.listado-migrantes-button />
        <div class="flex gap-4">
            <livewire:components.buttons.previous-step-button />
            <livewire:components.buttons.next-step-button />
        </div>
    </footer>
</main>
