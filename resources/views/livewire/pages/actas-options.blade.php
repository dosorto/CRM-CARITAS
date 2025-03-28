<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b border-gray-300">
        <h1 class="text-xl font-bold">Actas y Solicitudes</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <div class="flex flex-col justify-between h-full overflow-y-auto">
        <main class="flex items-center h-full">

            <div class="overflow-y-auto w-full p-4 flex justify-center items-center flex-wrap gap-8">

                @can('ver-actas-de-entrega')
                    <article>
                        <livewire:components.link-card title="Actas de Entrega" cardWidth="w-full"
                            iconClass="icon-[fluent-mdl2--product-list] size-6" route="actas-entrega-page" />
                    </article>
                @endcan


                @can('ver-solicitudes-de-traslado')
                    <article>
                        <livewire:components.link-card title="Solicitud de Traslado" cardWidth="w-full"
                            iconClass="icon-[mdi--file-replace-outline] size-6" route="solicitudes-traslado-page" />
                    </article>
                @endcan

                @can('ver-solicitudes-de-insumos')
                    <article>
                        <livewire:components.link-card title="Solicitud de Insumos" cardWidth="w-full"
                            iconClass="icon-[lsicon--goods-search-filled] size-6" route="solicitudes-insumos-page" />
                    </article>
                @endcan

            </div>
        </main>

        {{-- Footer fijo en la parte inferior --}}
        <footer class="h-auto flex justify-start bg-neutral text-base-content p-4">
            <aside>

            </aside>
        </footer>
    </div>
</div>
