<div class="h-screen w-full flex flex-col px-5">

    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold"> Registrar Migrante </h1>
        <button wire:click="cancelar" class="btn btn-sm btn-accent text-base-content">
            <span class="icon-[typcn--cancel] size-5"></span>
            Cancelar
        </button>
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


        @switch($currentStep)
            @case(1)
                <div class="h-full flex-grow border-4 border-accent rounded-box overflow-y-auto rounded-tl-none">
                    <livewire:crud.migrantes.form.identificacion-step />
                </div>
            @break

            @case(2)
                <div class="h-full flex-grow border-4 border-accent rounded-box overflow-y-auto">
                    <livewire:crud.migrantes.form.datos-personales-step />
                </div>
            @break

            @case(3)
                <div class="h-full flex-grow border-4 border-accent rounded-box overflow-y-auto">
                    <livewire:crud.migrantes.form.familiar-step />
                </div>
            @break

            @case(4)
                <div class="h-full flex-grow border-4 border-accent rounded-box overflow-auto">
                    <livewire:crud.migrantes.form.datos-migratorios-step />
                </div>
            @break

            @case(5)
                <div class="h-full flex-grow border-4 border-accent rounded-box overflow-y-auto">
                    <livewire:crud.migrantes.form.motivos-step />
                </div>
            @break

            @case(6)
                <div class="h-full flex-grow border-4 border-accent rounded-box overflow-y-auto">
                    <livewire:crud.migrantes.form.discapacidades-step />
                </div>
            @break

            @default
                <div class="h-full flex-grow border-4 border-accent rounded-box overflow-y-auto">
                    Oops... Algo está fuera de lugar.
                </div>
        @endswitch

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
            @if ($currentStep < 6)
                <livewire:components.buttons.next-step-button>
                @else
                    <label for="confirmarRegistroExpedienteModal" class="btn btn-info">
                        <span class="icon-[bxs--save] size-5"></span>
                        Guardar
                    </label>
            @endif
        </div>
    </footer>

    {{-- Modal de confirmación de la creación del expediente --}}
    <input type="checkbox" id="confirmarRegistroExpedienteModal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box bg-neutral border-2 border-green-600">
            <div class="flex w-full justify-center">
                <span class="icon-[ep--warning-filled] size-8 text-warning"></span>
            </div>
            <h3 class="text-lg font-bold text-center py-2">Confirmar Registro de Expediente</h3>
            <p class="text-center font-semibold">
                Se ha revisado y comprobado la información antes ingresada.

            </p>
            <p class="text-center pb-4 pt-2">
                Para cambiar o alterar los registros de migrantes posteriormente,
                se deberá solicitar formalmente a un usuario con los permisos pertinentes.</p>
            <div class="modal-action">
                <button wire:click="guardarRegistro" class="btn btn-success">Confirmar</button>
                <label for="confirmarRegistroExpedienteModal" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>

    {{-- Modal de alerta, el migrante todavía tiene un expediente activo. --}}
    <input type="checkbox" id="expedienteActivoModal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 max-w-5xl bg-neutral border-2 border-error">
            <div class="flex w-full justify-center">
                <span class="icon-[ep--warning-filled] size-8 text-error"></span>
            </div>
            <h3 class="text-lg font-bold text-center py-2">Oops...</h3>
            <p class="text-center font-semibold">
                Ya hay una persona registrada con este número de identificación.
                {{-- Esta persona ya está registrada y aún tiene un expediente activo. --}}
            </p>
            <p class="text-center pt-2">
                {{-- Para poder registrar uno nuevo, debe ir al listado de migrantes a registrar su salida del centro. --}}
            </p>
            <div class="modal-action">
                <label for="expedienteActivoModal" class="btn btn-accent text-base-content">Cerrar</label>
            </div>
        </div>
    </div>

    {{-- Modal de confirmación de la creación del expediente
    <input type="checkbox" id="reingresoModal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box bg-neutral border-2 border-green-600">
            <div class="flex w-full justify-center">
                <span class="icon-[ep--warning-filled] size-8 text-error"></span>
            </div>
            <h3 class="text-lg font-bold text-center py-2">Oops...</h3>
            <p class="text-center font-semibold">
                Esta persona ya tiene un expediente activo.
            </p>
            <p class="text-center pt-2">
                Para poder registrar uno nuevo, debe ir al listado de migrantes a registrar su salida del centro.
            </p>
            <div class="modal-action">
                <button wire:click="reingreso" class="btn btn-success">Confirmar</button>
                <label for="reingresoModal" class="btn btn-accent text-base-content">Cerrar</label>
            </div>
        </div>
    </div> --}}
</div>

@script
    <script>
        $wire.on('expediente-aun-activo', () => {
            document.getElementById('expedienteActivoModal').checked = true;
        });
    </script>
@endscript
