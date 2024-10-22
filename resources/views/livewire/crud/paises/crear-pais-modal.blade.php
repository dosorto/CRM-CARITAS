<div>
    <!-- You can open the modal using ID.showModal() method -->

    {{-- Botón para activar el Modal --}}
    <button class="btn btn-accent text-base-content gap-2 pl-3" onclick="crearPaisModal.showModal()">
        <span class="icon-[material-symbols--add-location-rounded] size-6"></span>
        <p>
            Añadir
        </p>
    </button>

    {{-- Contenedor de pantalla completa (se oscurece) --}}
    <dialog id="crearPaisModal" class="modal">

        {{-- Modal --}}
        <div class="modal-box w-1/2 max-w-5xl bg-accent">

            {{-- Título --}}
            <header>
                <h3 class="text-lg font-bold">Añadir País</h3>
            </header>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">


                <div>
                    <label> Nombre del País </label>
                    <input wire:model="Nombre" 
                    class="input bg-neutral" type="text" placeholder="Escribir aquí..." />
                </div>

                <div class="flex flex-row gap-[8%]">

                    <input wire:model="Alfa3" 
                    class="input bg-neutral w-[46%]" type="text" placeholder="Escribir aquí..." />

                    <input wire:model="Numerico" 
                    class="input bg-neutral w-[46%]" type="text" placeholder="Escribir aquí..." />

                </div>

            </main>


            <footer class="modal-action">
                <button wire:click.prevent="crear" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--add-location-rounded] size-5"></span>
                    Crear
                </button>
                <form method="dialog">
                    <!-- if there is a button, it will close the modal -->
                    <button class="btn btn-accent text-base-content">Cancelar</button>
                </form>
            </footer>
        </div>
    </dialog>
</div>
