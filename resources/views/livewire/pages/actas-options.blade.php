<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b border-gray-300">
        <h1 class="text-xl font-bold">Actas y Solicitudes</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <div class="flex flex-col justify-between h-full overflow-y-auto">
        <main class="flex items-center h-full">

            <div class="overflow-y-auto w-full p-4 flex justify-center items-center flex-wrap gap-16">

                <section class="border-2 border-accent rounded-xl p-8">
                    <h2 class="text-base-content text-lg font-bold text-center">
                        Actas de Entrega
                    </h2>
                    <hr class="border-2 border-accent my-6">
                    <div class="flex flex-col gap-6">
                        <article>
                            <livewire:components.link-card title="Ver Actas de Entrega" cardWidth="w-full"
                                iconClass="icon-[fa-solid--users] size-6" route="ver-actas-entrega" />
                        </article>
                        <article>
                            <livewire:components.link-card title="Registrar Acta de Entrega" cardWidth="w-full"
                                iconClass="icon-[mingcute--user-add-2-fill] size-6" route="crear-acta-entrega" />
                        </article>
                    </div>
                </section>
            </div>
        </main>

        {{-- Footer fijo en la parte inferior --}}
        <footer class="h-auto flex justify-start bg-neutral text-base-content p-4">
            <aside>

            </aside>
        </footer>
    </div>
</div>
