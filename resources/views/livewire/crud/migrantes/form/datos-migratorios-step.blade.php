<main class="flex-grow overflow-hidden flex flex-col">

    <section class="flex justify-between my-4 items-center">
        <h2 class="text-lg">
            <strong>Paso 4:</strong> Datos Migratorios
        </h2>
        <livewire:components.forms.steps :currentStep="1" :steps="4">
    </section>

    <article class="flex-grow flex overflow-y-auto rounded-lg border-2 border-accent p-6 gap-12">

        {{-- Frontera, asesor migratorio, y estado migratorio --}}
        <section class="w-1/2 h-full bg-red-100">
            <label class="label"> Seleccione la entidad que lo guió al centro: </label>
            <select wire:model="entidadReferencia" class="select bg-accent w-full">
                <option>911</option>
                <option>ACNUR</option>
                <option>ADRA</option>
                <option>Afiche Publicitario</option>
                <option>Brigada de Paz Internacional</option>
                <option>Cáritas</option>
                <option>Casa Migrante, San José Ocotepeque</option>
                <option>CDH</option>
                <option>CONADEH</option>
                <option>Cruz Roja</option>
                <option>DINAF</option>
                <option>Persona Civil</option>
                <option>Gran Terminal del Pacífico</option>
                <option>Grupo de Sociedad Civil</option>
            </select>

            <label class="label mt-2"> Seleccione la Frontera por la que ingresó al país: </label>
            <select wire:model="fronteraIngreso" class="select bg-accent w-full">
                <option>Guasaule</option>
                <option>Trojes</option>
                <option>Agua Caliente</option>
                <option>La Fraternidad</option>
                <option>El Amatillo</option>
                <option>Las Manos</option>
            </select>

            <label class="label mt-2"> Seleccione su situación migratoria: </label>
            <select wire:model="situacionEncontrada" class="select bg-accent w-full">
                <option>Necesidad de Protección Internacional</option>
                <option>Refugiado</option>
                <option>Solicitante de Asilo</option>
                <option>Migrante en Tránsito</option>
                <option>El Amatillo</option>
                <option>Las Manos</option>
            </select>
        </section>
        <section class="w-1/2 h-full bg-green-100">
            <label class="label">Seleccione los motivos por los que salió del país</label>
        </section>
    </article>
    <footer class="py-4 mb-0 flex justify-between">
        <livewire:crud.migrantes.listado-migrantes-button />
        <div class="flex gap-4">

            <button class="btn btn-accent text-base-content">
                <span class="icon-[mingcute--user-info-fill]"></span>
                Ver Datos Personales
            </button>

            <livewire:components.buttons.next-step-button />
        </div>
    </footer>
</main>
