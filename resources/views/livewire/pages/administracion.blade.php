<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b border-gray-300">
        <h1 class="text-xl font-bold">Administración General</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <main class="overflow-auto size-full p-4 flex flex-col">


        <div class="flex flex-col">
            <h2 class="text-xl font-semibold">
                Regiones
            </h2>
            <div class="flex flex-row gap-4 mt-4 pb-4 overflow-x-auto h-full text-nowrap">
                <article>
                    <livewire:components.link-card title="Paises" cardWidth="w-full" iconClass="icon-[vaadin--flag] size-6"
                        route="ver-paises" />
                </article>
                <article>
                    <livewire:components.link-card title="Departamentos" cardWidth="w-full"
                        iconClass="icon-[fluent--location-ripple-16-filled] size-6" route="ver-departamentos" />
                </article>
                <article>
                    <livewire:components.link-card title="Ciudades" cardWidth=" w-full"
                        iconClass="icon-[solar--city-bold] size-6" route="ver-ciudades" />
                </article>
            </div>

        </div>
        <hr class="border-2 border-accent">


        <div class="flex flex-col mt-6">
            <h2 class="text-xl font-semibold">
                Donaciones
            </h2>
            <div class="flex flex-row gap-4 mt-4 pb-4 overflow-x-auto h-full text-nowrap">
                <article>
                    <livewire:components.link-card title="Donantes" cardWidth=" w-full"
                        iconClass="icon-[streamline--give-gift-solid] size-6" route="ver-donantes" />
                </article>
                <article>
                    <livewire:components.link-card title="TipoDonantes" cardWidth=" w-full"
                        iconClass="icon-[fa-solid--hands-helping] size-6" route="ver-tipo-donantes" />
                </article>
            </div>

        </div>
        <hr class="border-2 border-accent">


        <div class="flex flex-col mt-6">
            <h2 class="text-xl font-semibold">
                Expedientes de Migrantes
            </h2>
            <div class="flex flex-row gap-4 mt-4 pb-4 overflow-x-auto h-full text-nowrap">
                <article>
                    <livewire:components.link-card title="Discapacidades" cardWidth="w-full"
                        iconClass="icon-[material-symbols--accessibility-rounded] size-6" route="ver-discapacidades" />
                </article>
                <article>
                    <livewire:components.link-card title="Situaciones Migratorias" cardWidth="w-full"
                        iconClass="icon-[fa6-solid--person-walking-luggage] size-6"
                        route="ver-situaciones-migratorias" />
                </article>
                <article>
                    <livewire:components.link-card title="Asesores Migratorios" cardWidth="w-full"
                        iconClass="icon-[tabler--navigation-heart] size-6" route="ver-asesores-migratorios" />
                </article>
                <article>
                    <livewire:components.link-card title="Fronteras" cardWidth="w-full"
                        iconClass="icon-[maki--police] size-6" route="ver-fronteras" />
                </article>
                <article>
                    <livewire:components.link-card title="Necesidades" cardWidth="w-full"
                        iconClass="icon-[hugeicons--bubble-chat-favourite] size-6" route="ver-necesidades" />
                </article>
            </div>
        </div>
        <hr class="border-2 border-accent">


        <div class="flex flex-col mt-6">
            <h2 class="text-xl font-semibold">
                Artículos y Mobiliario
            </h2>
            <div class="flex flex-row gap-4 mt-4 pb-4 overflow-x-auto h-full text-nowrap">
                <article>
                    <livewire:components.link-card title="Artículos" cardWidth="w-full"
                        iconClass="icon-[material-symbols--sanitizer-rounded] size-6" route="ver-articulos" />
                </article>
                <article>
                    <livewire:components.link-card title="Mobiliario" cardWidth="w-full"
                        iconClass="icon-[icon-park-solid--bedside-two] size-6" route="ver-mobiliarios" />
                </article>
            </div>
        </div>
        <hr class="border-2 border-accent">
    </main>


    {{-- Footer fijo en la parte inferior --}}
    <footer class="h-auto flex justify-start bg-neutral text-base-content p-4">
        <aside>

        </aside>
    </footer>
</div>
