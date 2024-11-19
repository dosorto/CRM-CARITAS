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
            <h3 class="text-lg font-bold text-center">Eliminar Donación</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full text-center">
                <p>¿Estás seguro de que deseas eliminar esta donación?</p>
                <p class="font-bold mt-2">{{ $item->donante->nombre_donante }} del {{ $item->fecha_donacion }}</p>
            </main>

            {{-- Acciones del Modal --}}
            <div class="modal-action">
                {{-- Spinner de carga --}}
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>

                {{-- Botón para confirmar eliminación --}}
                <button type="button" wire:click="deleteItem" class="btn btn-error text-primary-content gap-1 pl-3">
                    <span class="icon-[mingcute--delete-2-fill] size-5"></span>
                    Confirmar
                </button>

                {{-- Botón para cancelar --}}
                <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>

    document.addEventListener('DOMContentLoaded', () => {
        @this.on('cerrar-modal', () => {
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    });
</script>
@endpush
