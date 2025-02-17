<div>

    <!-- The button to open modal -->
    <label for="confirmationModal-{{ $idModal }}" class="btn btn-{{ $btnSize }} btn-{{ $btnColor }}">
        <span class="icon-[{{ $icon }}] size-{{ $iconSize }}"></span>
        {{ $label }}
    </label>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="confirmationModal-{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div @class([
            'modal-box',
            'border-2 border-{{ $borderColor }}' => $borderColor,
        ])>
            <h3 class="text-lg font-bold">{{ $title }}</h3>
            <p class="py-4">{{ $description }}</p>
            <div class="modal-action">
                <button class="btn btn-success">
                    <span class="icon-[fa-solid--check] size-6"></span>
                    Confirmar
                </button>
                <label for="confirmationModal-{{ $idModal }}" class="btn btn-accent">
                    <span class="icon-[f7--xmark] size-6"></span>
                    Cancelar
                </label>
            </div>
        </div>
    </div>
</div>
