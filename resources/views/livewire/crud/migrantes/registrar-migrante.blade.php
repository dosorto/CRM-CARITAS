<div class="h-screen w-full flex flex-col px-5">

    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold"> Registrar Migrante </h1>
        <div>
            <button wire:click="cancelar" class="btn btn-sm btn-accent text-base-content">
                <span class="icon-[typcn--cancel] size-5"></span>
                Cancelar
            </button>
        </div>
    </header>

    <div class="h-full flex flex-col mt-4 overflow-hidden">
        {{-- Tabs --}}
        <div class="w-full h-max flex justify-start">
            @foreach ($stepNames as $step => $name)
                <div
                    class="tab pointer-events-none border-accent rounded-t-lg font-semibold
                    @if ($currentStep == $step) bg-accent @endif">
                    Paso {{ $step }} @if ($currentStep == $step)
                        : {{ $name }}
                    @endif
                </div>
            @endforeach
        </div>

        {{-- Contenido de las tabs --}}
        <div
            class="h-full flex-grow border-4 border-accent rounded-box overflow-y-auto
            @if ($currentStep == 1) rounded-tl-none @endif">

            @switch($currentStep)
                @case(1)
                    <livewire:crud.migrantes.form.identificacion-step />
                @break

                @case(2)
                    <livewire:crud.migrantes.form.datos-personales-step />
                @break

                @case(3)
                    <livewire:crud.migrantes.form.familiar-step />
                @break

                @case(4)
                    <livewire:crud.migrantes.form.datos-migratorios-step />
                @break

                @case(5)
                    Necesidades y Observaciones...
                @break

                @default
                    Oops... Algo está fuera de lugar.
            @endswitch

        </div>
    </div>

    <footer class="py-4 w-full flex">
        <div class="w-1/3 flex justify-start">
            @if ($currentStep > 1)
                <livewire:components.buttons.previous-step-button>
            @endif
        </div>
        <div class="w-1/3 flex justify-center items-center">
            {{-- <p class="font-semibold text-lg text-error">
                Mensaje de error...
            </p> --}}
            <span wire:loading class="loading loading-spinner loading-lg"></span>
        </div>
        <div class="w-1/3 flex justify-end">
            @if ($currentStep < 5)
                <livewire:components.buttons.next-step-button>
                @else
                    <button class="btn btn-info">
                        <span class="icon-[bxs--save] size-5"></span>
                        Guardar
                    </button>
            @endif
        </div>
    </footer>

</div>
