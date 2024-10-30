<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Registrar Migrante</h1>
        <div>
            <a href="{{ route('ver-migrantes') }}" class="btn btn-accent btn-sm text-base-content h-10" type="button">
                <span class="icon-[ph--user-list-bold] size-6"></span>
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
            <livewire:crud.migrantes.form.datos-personales-step :identificacion="$identificacion">
            @break

        @case(3)
            <livewire:crud.migrantes.form.familiar-step>
            @break

            @default
    @endswitch

</div>
