<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Donaciones</h1>
        <div>

        </div>
    </header>


    <section class="flex justify-between py-4 h-max">


        <div class="w-[55%]">
            <livewire:components.buscador-dinamico :fakeColNames="$fakeColNames" />
        </div>


        <div class="join w-[45%] flex justify-end gap-4">
            <livewire:components.limpiar-filtros />
            <button class="btn btn-accent text-base-content gap-2 pl-3" wire:click="crearDonacion">
                <span class="icon-[gridicons--add] size-6"></span>
                Añadir Donación
            </button>
        </div>
    </section>


    <livewire:components.content-table :colNames="$colNames" :keys="$keys" :itemClass="$itemClass" :paginationSize="$paginationSize"
        :actions="$actions" />
</div>
