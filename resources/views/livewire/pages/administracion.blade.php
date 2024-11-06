<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b border-gray-300">
        <h1 class="text-xl font-bold">Administración General</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <div class="flex flex-col justify-between h-full">
        <main class="flex items-center h-full">

            <div class="overflow-y-auto w-full p-4 flex justify-center items-center flex-wrap gap-6">
                <article>
                    <livewire:components.link-card title="Paises" cardWidth=" w-full"
                        iconClass="icon-[vaadin--flag] size-6" route="ver-paises" />
                </article>

                <article>
                    <livewire:components.link-card title="Departamentos" cardWidth=" w-full"
                        iconClass="icon-[fluent--location-ripple-16-filled] size-6" route="ver-departamentos" />
                </article>
                <article>
                    <livewire:components.link-card title="Ciudades" cardWidth=" w-full"
                        iconClass="icon-[solar--city-bold] size-6" route="ver-ciudades" />
                </article>
                <article>
                    <livewire:components.link-card title="Reportes Mensuales" cardWidth=" w-full"
                        iconClass="icon-[bxs--report] size-6" route="reporte-mensual" />
                </article>
                <article>
                    <livewire:components.link-card title="Discapacidades" cardWidth=" w-full"
                        iconClass="icon-[material-symbols--accessibility-rounded] size-6" route="ver-discapacidades" />
                </article>
                <article>
                    <livewire:components.link-card title="Situaciones Migratorias" cardWidth=" w-full"
                        iconClass="icon-[fa6-solid--person-walking-luggage] size-6"
                        route="ver-situaciones-migratorias" />
                </article>
                <article>
                    <livewire:components.link-card title="Asesores Migratorios" cardWidth=" w-full"
                        iconClass="icon-[fa6-solid--person-walking-luggage] size-6"
                        route="ver-asesores-migratorios" />
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
