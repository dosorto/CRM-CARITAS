<div>
    {{-- Botón para activar el Modal --}}
    <label for="editPaisModal-{{ $pais->id }}" class="btn btn-sm btn-warning text-warning-content gap-2 pl-3">
        <span class="icon-[line-md--edit] size-4"></span>
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="editPaisModal-{{ $pais->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Editar País</h3>

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
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>
                <button type="button" wire:click="editItem" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--save] size-5"></span>
                    Guardar
                </button>
                <label for="editPaisModal-{{ $pais->id }}" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        document.getElementById('editPaisModal-{{ $pais->id }}').addEventListener('change', function(event) {
            if (event.target.checked) {
                // Llama a la función `resetForm` del componente para restablecer los valores
                $wire.initForm();
            }
        });

        $wire.on('cerrar-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('editPaisModal-{{ $pais->id }}').checked = false;
        });
    </script>
@endscript
