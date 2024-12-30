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

    <div class="size-full flex-grow my-4 border-x-4 rounded-xl border-b-4 border-base-300">
        <div role="tablist" class="tabs tabs-lifted">
            <input type="radio" name="steps" role="tab" class="tab font-semibold pointer-events-none"
                aria-label="Paso 1 @if ($currentStep == 1) : {{ $stepNames[1] }} @endif"
                wire:model="currentStep" value="1" />
            <div role="tabpanel" class="h-full flex-grow tab-content bg-neutral  rounded-box p-6">
                <livewire:crud.migrantes.form.identificacion-step />
            </div>

            <input type="radio" name="steps" role="tab" class="tab font-semibold pointer-events-none"
            aria-label="Paso 2 @if ($currentStep == 2) : {{ $stepNames[2] }} @endif"
            wire:model="currentStep" value="2" />
            <div role="tabpanel" class="tab-content bg-neutral rounded-box p-6">
                <livewire:crud.migrantes.form.datos-personales-step />
            </div>

            <input type="radio" name="steps" role="tab" class="tab font-semibold pointer-events-none"
                aria-label="Paso 3 @if ($currentStep == 3) : {{ $stepNames[3] }} @endif"
                wire:model="currentStep" value="3" />
            <div role="tabpanel" class="tab-content bg-neutral rounded-box p-6">
                Registro Familiar...
            </div>

            <input type="radio" name="steps" role="tab" class="tab font-semibold pointer-events-none"
                aria-label="Paso 4 @if ($currentStep == 4) : {{ $stepNames[4] }} @endif"
                wire:model="currentStep" value="4" />
            <div role="tabpanel" class="tab-content bg-neutral rounded-box p-6">
                Situación Migratoria...
            </div>

            <input type="radio" name="steps" role="tab" class="tab font-semibold pointer-events-none"
                aria-label="Paso 5 @if ($currentStep == 5) : {{ $stepNames[5] }} @endif"
                wire:model="currentStep" value="5" />
            <div role="tabpanel" class="tab-content bg-neutral rounded-box p-6">
                Necesidades y Observaciones...
            </div>
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
