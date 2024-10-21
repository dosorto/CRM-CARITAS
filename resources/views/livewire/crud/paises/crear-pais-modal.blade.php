<div>
    <!-- You can open the modal using ID.showModal() method -->
    <button class="btn btn-accent text-base-content gap-4" onclick="my_modal_4.showModal()">
        

        <p>
            Crear
        </p>        
    </button>
    <dialog id="my_modal_4" class="modal">
        <div class="modal-box w-1/2 max-w-5xl">

            {{-- Título --}}
            <h3 class="text-lg font-bold">Hello!</h3>

            {{-- Contenido --}}
            <p class="py-4">Click the button below to close</p>

            {{-- Botones --}}
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button, it will close the modal -->
                    <button class="btn btn-accent text-base-content">Close</button>
                </form>
            </div>
        </div>
    </dialog>
</div>
