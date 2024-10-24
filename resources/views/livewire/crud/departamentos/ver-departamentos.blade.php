<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Departamentos</h1>
        <div>
            Cosas aparte...
        </div>
    </header>

    {{-- Contenedor encima de la tabla --}}
    <section class="flex justify-between py-4 h-max">

        {{-- Buscador --}}
        <div class="w-[55%]">
            <livewire:components.buscador-dinamico :fakeColNames="$fakeColNames" />
        </div>

        {{-- Botones --}}
        <div class="join w-[45%] flex justify-end gap-4">
            <livewire:components.limpiar-filtros />
            <livewire:crud.paises.crear-pais-modal />
        </div>
    </section>

    <livewire:components.content-table :colNames="$colNames" :keys="$keys" :itemClass="$itemClass" :paginationSize="10"/>
</div>
