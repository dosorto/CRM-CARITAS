<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-error text-primary-content gap-2">
        <span class="icon-[mingcute--delete-2-fill] size-4"></span>
    </label>

    {{-- Modal de Confirmación --}}
    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Eliminar Artículo</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full text-center">
                <p>¿Estás seguro de que deseas eliminar este artículo?</p>
                <p class="font-bold mt-2">{{ $item->nombre }}</p>
            </main>

            {{-- Acción del modal --}}
            <div class="modal-action">
                <button type="button" wire:click="deleteItem" class="btn btn-error text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--delete] size-5"></span>
                    Confirmar
                </button>

                <button wire:click="cancelar" class="btn btn-accent text-base-content">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        Livewire.on('error', message => {
            Swal.fire({
                icon: 'error',
                title: '¡Operación no permitida!',
                text: message,
                confirmButtonText: 'Entendido',
                confirmButtonColor: '#d33'
            }).then(() => {
                // Cierra el modal después de aceptar
                document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
            });
        });
        $wire.on('close-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    </script>
@endscript
