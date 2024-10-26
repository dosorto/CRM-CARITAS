<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-accent text-base-content gap-2 pl-3">
        <span class="icon-[material-symbols--add-location-rounded] size-6"></span>
        Añadir
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Añadir País</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Contenedor del nombre del País --}}
                <div class="flex flex-col mt-6">
                    <label class="mb-1"> Nombre del País </label>
                    <input wire:model="Nombre" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('Nombre')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Inputs de Codigos alfa3 y numericos --}}
                <div class="flex flex-row w-full justify-between mt-6">
                    <div class="w-[47%] flex flex-col">

                        <label class="mb-1"> Código alfa-3 </label>
                        <input wire:model="Alfa3" class="input bg-accent" type="text"
                            placeholder="Escribir aquí..." />
                        <div class="mt-1 text-error-content font-bold">
                            @error('Alfa3')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="w-[47%] flex flex-col">
                        <label class="mb-1"> Código Numérico </label>
                        <input wire:model="Numerico" class="input bg-accent" type="number"
                            placeholder="Escribir aquí..." />
                        <div class="mt-1 text-error-content font-bold">
                            @error('Numerico')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </main>

            <div class="modal-action">
                <div wire:loading class="flex items-center p-3">
                    <span class="loading loading-dots size-6 text-gray-400"></span>
                </div>
                <button type="button" wire:click="create" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--add-location-rounded] size-5"></span>
                    Crear
                </button>
                <label for="{{ $idModal }}" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('cerrar-modal', () => {
            // Cerrar el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endscript
