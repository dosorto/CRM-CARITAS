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
                <article>
                    <livewire:components.link-card title="Reporte Mensual" cardWidth="w-full" iconClass="icon-[tabler--presentation-analytics-filled] size-6"
                        route="reporte-mensual" />
                </article>
                {{-- <article>
                    <livewire:components.link-card title="Reporte Artículo" cardWidth="w-full" iconClass="icon-[tabler--presentation-analytics-filled] size-6"
                        route="reporte-articulos" />
                </article> --}}
            </div>
        </main>

        {{-- Footer fijo en la parte inferior --}}
        <footer class="h-auto flex justify-start bg-neutral text-base-content p-4">
            <aside>

            </aside>
        </footer>
    </div>
</div>
