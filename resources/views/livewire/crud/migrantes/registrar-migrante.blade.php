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
                    class="tab pointer-events-none border-base-100 rounded-t-lg font-semibold
                    @if ($currentStep == $step) bg-base-100 @endif">
                    Paso {{ $step }} @if ($currentStep == $step)
                        : {{ $name }}
                    @endif
                </div>
            @endforeach
        </div>

        {{-- Contenido de las tabs --}}
        <div
            class="h-full flex-grow border-4 border-base-300 rounded-box p-4 overflow-y-auto
            @if ($currentStep == 1) rounded-tl-none @endif">

            @switch($currentStep)
                @case(1)
                    Identificación...
                @break

                @case(2)
                    Datos Personales...
                @break

                @case(3)
                    Registro Familiar...
                @break

                @case(4)
                    Situación Migratoria
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
        <div class="w-1/2 flex justify-start">
            @if ($currentStep > 1)
                <livewire:components.buttons.previous-step-button>
            @endif
        </div>
        <div class="w-1/2 flex justify-end">
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
