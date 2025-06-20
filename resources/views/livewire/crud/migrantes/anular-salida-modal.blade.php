<div>
    <label for="anularSalidaModal-{{ $migranteId }}" class="btn btn-error btn-sm w-12">
        <span class="icon-[fluent--person-arrow-back-16-filled] size-6"></span>
    </label>
    <input type="checkbox" id="anularSalidaModal-{{ $migranteId }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 h-max max-w-5xl bg-neutral border-2 border-error">
            <span class="icon-[mingcute--warning-fill] size-10 text-error"></span>
            <p class="py-4 text-lg font-semibold">¿Seguro que desea anular el registro de salida de este migrante?</p>
            <p class="text-base font-semibold">{{ $nombre }} - {{ $identificacion }}</p>
            <p class="py-4">Esta acción no se puede deshacer.<br>
                Las observaciones y los registros de atenciones se mantendrán en el sistema</p>
            <div class="modal-action">
                <span wire:loading class="loading loading-spinner loading-lg"></span>
                <button class="btn btn-warning" wire:click="anularSalida">
                    <span class="icon-[ep--warning-filled] size-6"></span>
                    <span class="font-semibold">Confirmar</span>
                </button>
                <label for="anularSalidaModal-{{ $migranteId }}" class="btn btn-accent">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('anularSalidaModal-{{ $migranteId }}').checked = false;
        });
    </script>
@endscript
