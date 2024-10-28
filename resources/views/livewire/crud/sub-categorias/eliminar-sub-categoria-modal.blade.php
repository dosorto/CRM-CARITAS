<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-error text-primary-content gap-2">
        <span class="icon-[mingcute--delete-2-fill] size-4"></span>
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 max-w-5xl bg-neutral border-2 border-accent">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-5">¿Está seguro de que desea eliminar esta Subcategoría?</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full gap-2">

                <div class="flex gap-1">
                    <strong>Nombre de la Subcategoría:</strong>
                    <p> {{ $item->nombre_subcategoria }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Categoría</strong>
                    <p> {{ $item->categoria->nombre_categoria }} </p>
                </div>
            </main>

            <div class="modal-action">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>
                <button type="button" wire:click="deleteItem" class="btn btn-error text-primary-content gap-1 pl-3">
                    <span class="icon-[mingcute--delete-2-fill] size-5"></span>
                    Confirmar
                </button>
                <label for="{{ $idModal }}-{{ $item->id }}"
                    class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script 
    <script>
        document.getElementById('{{ $idModal }}-{{ $item->id }}').addEventListener('change', function(event) {
            if (event.target.checked) {
                // Llama a la función `resetForm` del componente para restablecer los valores
                $wire.initInfo();
            }
        });

        $wire.on('cerrar-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    </script>
@endscript
