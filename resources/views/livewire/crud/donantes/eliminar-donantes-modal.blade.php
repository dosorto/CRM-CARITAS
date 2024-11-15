<div>
    <label for="{{ $idModal }}" class="btn btn-sm btn-error text-primary-content gap-2">
        <span class="icon-[mingcute--delete-2-fill] size-4"></span>
    </label>

    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/3 max-w-5xl bg-neutral">
            <h3 class="text-lg font-bold text-center">Eliminar Donante</h3>

            <main class="h-max flex flex-col w-full text-center">
                <p>¿Estás seguro de que deseas eliminar este donante?</p>
                <p class="font-bold mt-2">{{ $item->nombre_donante }}</p>
            </main>

            <div class="modal-action">
                <button type="button" wire:click="deleteItem" class="btn btn-error text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--delete] size-5"></span>
                    Confirmar
                </button>
                <label for="{{ $idModal }}" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        @this.on('cerrar-modal', () => {
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endpush
