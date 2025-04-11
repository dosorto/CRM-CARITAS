<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-error text-primary-content gap-2">
        <span class="icon-[mingcute--delete-2-fill] size-4"></span>
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/3 max-w-5xl bg-neutral">
            <h3 class="text-lg font-bold text-center">Eliminar Donante</h3>

            <main class="h-max flex flex-col w-full text-center">
                <p>¿Estás seguro de que deseas eliminar este donante?</p>
                <p class="font-bold mt-2">{{ $item->nombre_donante }}</p>
            </main>

            <div class="modal-action">
                {{-- Botón para confirmar eliminación --}}
                <button type="button" wire:click="deleteItem" class="btn btn-error text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--delete] size-5"></span>
                    Confirmar
                </button>
                {{-- Botón para cancelar y cerrar el modal --}}
                <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-accent text-base-content">Cancelar</label>
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
        Livewire.on('error', message => {
            Swal.fire({
                icon: 'error',
                title: '¡No se puede eliminar!',
                text: message,
                confirmButtonText: 'Entendido',
                confirmButtonColor: '#d33'
            });
        });
        $wire.on('cerrar-modal', () => {
            // Cerrar el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    </script>
@endscript
