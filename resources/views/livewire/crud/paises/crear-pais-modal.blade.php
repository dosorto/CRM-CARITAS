<div>
    <!-- You can open the modal using ID.showModal() method -->
    <button class="btn btn-accent text-base-content gap-2 pl-3" onclick="my_modal_4.showModal()">

        <span class="icon-[material-symbols--add-location-rounded] size-6"></span>
        <p>
            Añadir
        </p>
    </button>
    <dialog id="my_modal_4" class="modal">
        <div class="modal-box w-1/2 max-w-5xl">

            {{-- Título --}}
            <header>
                <h3 class="text-lg font-bold">Añadir País</h3>
            </header>

            {{-- Contenido --}}
            <main>

            </main>
            <p class="py-4">Click the button below to close</p>


            <footer class="modal-action">
                <form method="dialog">
                    <!-- if there is a button, it will close the modal -->
                    <button class="btn btn-accent text-base-content">Close</button>
                </form>
            </footer>
        </div>
    </dialog>
</div>
