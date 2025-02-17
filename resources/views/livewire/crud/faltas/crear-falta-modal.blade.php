<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="flex w-full btn btn-{{ $btnSize }} btn-accent text-base-content gap-2 pl-3">
        <span class="icon-[mdi--plus-circle] size-{{ $iconSize }}"></span>
        {{ $label }}
    </label>

    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-5xl w-2/3 bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Añadir Falta Disciplinaria</h3>

            <main class="h-max flex flex-col w-full">

                <div class="flex flex-row w-full justify-between mt-6 gap-6">
                    <div class="w-2/3 flex flex-col">
                        <label class="mb-1">Falta</label>
                        <input wire:model="Falta" class="input bg-accent" type="text"
                            placeholder="Escribir aquí..." />
                        <div class="mt-1 text-error-content font-bold">
                            @error('Falta')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- País --}}
                    <div class="w-1/3 flex flex-col">
                        <label class="mb-1">Gravedad</label>
                        <select wire:model="GravedadId" class="select bg-accent text-base-content">
                            @foreach ($Gravedades as $Gravedad)
                                <option value="{{ $Gravedad->id }}">{{ $Gravedad->gravedad_falta }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </main>

            <div class="modal-action">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>
                <button type="button" wire:click="create" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[mdi--plus-circle] size-5"></span>
                    Crear
                </button>
                <button wire:click="closeModal" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endscript
