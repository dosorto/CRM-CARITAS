<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b border-gray-300">
        <h1 class="text-xl font-bold">Datos Estadísticos</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <div class="flex flex-col justify-between h-full">
        <main class="h-full overflow-y-auto w-full p-4">
            {{-- KPI's --}}
            <section class="flex justify-between space-x-4 w-full">
                <article class="w-1/4 border-2 border-dashed border-gray-400 p-4 rounded-lg">
                    KPI 1
                </article>
                <article class="w-1/4 border-2 border-dashed border-gray-400 p-4 rounded-lg">
                    KPI 2
                </article>
                <article class="w-1/4 border-2 border-dashed border-gray-400 p-4 rounded-lg">
                    KPI 3
                </article>
                <article class="w-1/4 border-2 border-dashed border-gray-400 p-4 rounded-lg">
                    KPI 4
                </article>
            </section>

            {{-- Gráficos --}}
            <section class="flex justify-between space-x-4 mt-6 w-full">
                <article class="w-1/3 border-2 border-dashed border-gray-400 p-4 rounded-lg h-full">
                    Gráfico 1
                </article>
                <article class="w-2/3 border-2 border-dashed border-gray-400 p-4 rounded-lg  h-full">
                    Gráfico 2
                </article>
            </section>
        </main>

        {{-- Footer fijo en la parte inferior --}}
        <footer class="h-auto flex justify-start bg-neutral text-base-content p-4">
            <aside>
                <article class="w-full">
                    <livewire:components.link-card title="Administración" cardWidth="w-full"
                        iconClass="icon-[fluent--text-box-settings-24-filled] size-8" route="administracion-general" />
                </article>
            </aside>
        </footer>
    </div>
</div>
