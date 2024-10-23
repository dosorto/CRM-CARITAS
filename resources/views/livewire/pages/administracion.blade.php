<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b border-gray-300">
        <h1 class="text-xl font-bold">Administración General</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <div class="flex flex-col justify-between h-full">
        <main class="h-full overflow-y-auto w-full p-4 flex justify-center items-center flex-wrap">
            <article>
                <livewire:components.link-card title="Paises" cardWidth=" w-full"
                    iconClass="icon-[vaadin--flag] size-6" route="ver-paises" />
            </article>
        </main>

        {{-- Footer fijo en la parte inferior --}}
        <footer class="h-auto flex justify-start bg-neutral text-base-content p-4">
            <aside>

            </aside>
        </footer>
    </div>
</div>