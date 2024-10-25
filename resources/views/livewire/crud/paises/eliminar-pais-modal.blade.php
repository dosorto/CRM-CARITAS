<div>
    {{-- Botón para activar el Modal --}}
    <label for="eliminarPaisModal-{{$pais->id}}" class="btn btn-sm btn-error text-primary-content gap-2">
        <span class="icon-[mingcute--delete-2-fill] size-4"></span>
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="eliminarPaisModal-{{$pais->id}}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 max-w-5xl bg-neutral border-2 border-accent">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-5">¿Está seguro de que desea eliminar este País?</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full gap-2">

                <div class="flex gap-1">
                    <strong>Nombre del País:</strong>
                    <p> {{$pais->nombre_pais}} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Código Alfa-3:</strong>
                    <p> {{$pais->codigo_alfa3}} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Código Numérico</strong>
                    <p> {{$pais->codigo_numerico}} </p>
                </div>
            </main>

            <div class="modal-action">
                <div wire:loading class="flex items-center p-3">
                    <span class="loading loading-dots size-6 text-gray-400"></span>
                </div>
                <button type="button" wire:click="deleteItem" class="btn btn-error text-primary-content gap-1 pl-3">
                    <span class="icon-[mingcute--delete-2-fill] size-5"></span>
                    Confirmar
                </button>
                <label for="eliminarPaisModal-{{$pais->id}}" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('cerrar-modal', () => {
            // Cerrar el modal desactivando el checkbox
            document.getElementById('eliminarPaisModal-{{$pais->id}}').checked = false;
        });
    </script>
@endscript