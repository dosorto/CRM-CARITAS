<div class="h-screen w-full flex flex-col px-5">

    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold"> Registrar Migrante </h1>
        <div>
            @if (session('currentStep') < 4)
                <button wire:click="cancelarRegistro" class="btn btn-sm bg-accent">
                    <span class="icon-[gravity-ui--circle-xmark] size-4"></span>
                    Cancelar
                </button>
            @endif
        </div>
    </header>

    {{-- Pasos --}}
    @switch(session('currentStep'))
        @case(1)
            <livewire:crud.migrantes.form.identificacion-step>
            @break

            @case(2)
                <livewire:crud.migrantes.form.datos-personales-step>
                @break

                @case(3)
                    <livewire:crud.migrantes.form.familiar-step>
                    @break

                    @case(4)
                        <livewire:crud.migrantes.form.datos-migratorios-step>
                        @break

                        @case(5)
                            <livewire:crud.migrantes.form.situacion-step>
                            @break
                        @endswitch

</div>
