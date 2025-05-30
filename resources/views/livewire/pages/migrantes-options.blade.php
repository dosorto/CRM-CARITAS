<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b border-gray-300">
        <h1 class="text-xl font-bold">Migrantes</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <div class="flex flex-col justify-between h-full overflow-y-auto">
        <main class="flex items-center h-full">
            <div class="overflow-y-auto w-full p-4 flex justify-center items-center flex-wrap gap-6">
                @can('ver-migrantes')
                    <article>
                        <livewire:components.link-card title="Listado de Migrantes" cardWidth="w-full"
                            iconClass="icon-[fa-solid--users] size-6" route="ver-migrantes" />
                    </article>
                    <livewire:crud.migrantes.generar-excel-modal />
                @endcan
                @can('registrar-migrantes')
                    <article>
                        <livewire:components.link-card title="Registrar Migrante" cardWidth="w-full"
                            iconClass="icon-[mingcute--user-add-2-fill] size-6" route="registrar-migrante" />
                    </article>
                @endcan
                <article>
                    <livewire:components.link-card title="Formato de Ficha de Registro" cardWidth="w-full"
                        iconClass="icon-[material-symbols--print] size-6" route="ver-expediente" />
                </article>
            </div>
        </main>
    </div>
</div>
