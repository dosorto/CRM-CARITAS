<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 mb-4 border-b-2 border-accent">
        <h1 class="text-2xl font-bold">Registro de Conducta</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>
    <main class="h-full flex flex-col ml-4">
        {{-- Faltas Disciplinarias --}}
        <section class="h-full w-1/2 gap-4 border-2">
            <div class="p-4 text-center flex items-center justify-center h-full">
                <span class="font-semibold">¡No hay faltas disciplinarias para mostrar!</span>
            </div>
        </section>


    </main>
    <footer class="h-max flex flex-col justify-center bg-neutral text-base-content p-4">
        <livewire:crud.migrantes.info-migrante-modal :iconSize="6" btnSize="" label="Datos Personales"
            :personaId="1" idModal="infoMigranteSalida" />
    </footer>
</div>
