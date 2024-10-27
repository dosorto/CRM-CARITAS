<main class="flex-grow overflow-hidden flex flex-col">

    <section class="flex justify-between my-4 items-center">
        <h2 class="text-lg">
            <strong>Paso 2:</strong> Registrar Datos Personales
        </h2>
        <livewire:components.forms.steps :currentStep="2" :steps="4">
    </section>

    <article class="flex-grow overflow-y-auto rounded-lg border-2 border-accent">

    </article>

    <footer class="py-4 border-t border-accent mb-0 flex gap-4 justify-end">
        <livewire:components.buttons.previous-step-button/>
        <livewire:components.buttons.next-step-button/>
    </footer>
</main>
