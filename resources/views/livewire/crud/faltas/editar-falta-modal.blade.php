<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-warning text-warning-content gap-2 pl-3">
        <span class="icon-[line-md--edit] size-4"></span>
    </label>

    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Editar Falta Disciplinaria</h3>

            <main class="h-max flex flex-col w-full">

                {{-- Inputs de Codigo de Depto y Pais Seleccionado --}}
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
                <button type="button" wire:click="editItem" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--save] size-5"></span>
                    Guardar
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
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    </script>
@endscript
