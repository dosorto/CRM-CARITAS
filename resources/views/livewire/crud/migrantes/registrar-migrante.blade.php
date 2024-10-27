<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Registrar Migrante</h1>
        <div>
            <a href="#" class="btn btn-accent btn-sm text-base-content" type="button">
                Listado de Migrantes
            </a>
        </div>
    </header>

    {{-- Pasos --}}

    @switch($currentStep)
        @case(1)
            <livewire:crud.migrantes.form.identificacion-step :identificacion="$identificacion">
            @break
        @case(2)
            <livewire:crud.migrantes.form.datos-personales-step>
            @break
        @default
    @endswitch



</div>
