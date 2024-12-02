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
                    <livewire:components.link-card title="Listado de Migrantes" cardWidth="w-full" iconClass="icon-[fa-solid--users] size-6"
                        route="ver-migrantes" />
                </article>
                <article>
                    <livewire:components.link-card title="Registrar Migrante" cardWidth="w-full" iconClass="icon-[mingcute--user-add-2-fill] size-6"
                        route="registrar-migrante" />
                </article>
                <article>
                    <livewire:components.link-card title="Faltas Disciplinarias" cardWidth="w-full" iconClass="icon-[fluent--clipboard-error-16-filled] size-6"
                        route="ver-faltas" />
                </article>
                <article>
                    <livewire:components.link-card title="Gravedades de Faltas" cardWidth="w-full" iconClass="icon-[fluent--clipboard-error-16-filled] size-6"
                        route="ver-gravedades-faltas" />
                </article>
            </div>
        </main>

        {{-- Footer fijo en la parte inferior --}}
        <footer class="h-auto flex justify-start bg-neutral text-base-content p-4">
            <aside>

            </aside>
        </footer>
    </div>
</div>
