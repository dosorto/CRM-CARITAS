<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Donaciones</h1>
        <div>
            {{-- Cosas aparte... Puedes añadir botones adicionales o filtros aquí --}}
        </div>
    </header>

    
    <section class="flex justify-between py-4 h-max">

        
        <div class="w-[55%]">
            <livewire:components.buscador-dinamico :fakeColNames="$fakeColNames" />
        </div>

       
        <div class="join w-[45%] flex justify-end gap-4">
            <livewire:components.limpiar-filtros />
            <livewire:crud.donaciones.crear-donaciones-modal :idModal="$idCreateModal" />
        </div>
    </section>

   
    <livewire:components.content-table
        :colNames="$colNames"
        :keys="$keys"
        :itemClass="$itemClass"
        :paginationSize="$paginationSize"
        :actions="$actions"
    />
</div>
