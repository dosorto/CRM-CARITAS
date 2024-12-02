<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b border-gray-300">
        <h1 class="text-xl font-bold">Datos Estadísticos</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <div class="flex flex-col justify-between h-full overflow-auto">
        <main class="h-full overflow-y-auto w-full p-4">
            {{-- KPI's --}}
            <section class="flex justify-between space-x-4 w-full">
                <article class="w-1/3 border-2 border-dashed border-gray-400 p-1 rounded-lg">
                    <div
                        class="border-2 border-purple-400 w-full h-auto p-2 flex items-center rounded-md bg-purple-400 gap-4">

                        <span class="icon-[fluent--people-community-20-filled] size-10"></span>

                        <div class="flex flex-col text-base-content text-sm">
                            <span class="font-semibold">
                                Migrantes
                            </span>
                            <p class="font-bold text-3xl">
                                {{ $migrantes }}
                            </p>

                        </div>
                    </div>
                </article>


                <article class="w-1/3 border-2 border-dashed border-gray-400 p-1 rounded-lg">
                    <div
                        class="border-2 border-teal-500 w-full h-auto p-2 flex items-center rounded-md bg-teal-500 gap-4">

                        <span class="icon-[ion--woman-sharp] size-10"></span>

                        <div class="flex flex-col text-base-content text-sm">
                            <span class="font-semibold">
                                Mujeres
                            </span>
                            <p class="font-bold text-3xl">
                                {{ $mujeres }}
                            </p>

                        </div>
                    </div>
                </article>

                <article class="w-1/3 border-2 border-dashed border-gray-400 p-1 rounded-lg">
                    <div
                        class="border-2 border-blue-400 w-full h-auto p-2 flex items-center rounded-md bg-blue-400 gap-4">

                        <span class="icon-[ion--man-sharp] size-10"></span>

                        <div class="flex flex-col text-base-content text-sm">
                            <span class="font-semibold">
                                Hombres
                            </span>
                            <p class="font-bold text-3xl">
                                {{ $hombres }}
                            </p>

                        </div>
                    </div>
                </article>
                <article class="w-1/4 border-2 border-dashed border-gray-400 p-1 rounded-lg">
                    <div class="size-full p-2 bg-accent">
                        Solicitudes Pendientes aquí
                    </div>
                </article>

            </section>

            {{-- Gráficos --}}
            <section class="flex justify-between space-x-4 mt-6 w-full">
                <article class="w-1/3 border-2 border-dashed border-gray-400 p-4 rounded-lg h-max">
                    <x-chartjs-component :chart="$chartDonut" />
                </article>
                <article class="w-2/3 border-2 border-dashed border-gray-400 p-4 rounded-lg h-full">
                    <x-chartjs-component :chart="$chart" />
                </article>
            </section>
        </main>

        {{-- Footer fijo en la parte inferior --}}
        <footer class="h-auto flex flex-col justify-center bg-neutral text-base-content p-4">
            Pie de páginaaa
        </footer>
    </div>
</div>
