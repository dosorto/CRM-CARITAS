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
                <article class="w-4/12 border-2 border-dashed border-gray-400 p-4 rounded-lg">
                    <div class="border-2 border-purple-500 w-full h-auto p-4 flex justify-between items-center rounded-md bg-purple-500 dark:text-white">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 0 640 512"><path fill="#ffffff" d="M72 88a56 56 0 1 1 112 0a56 56 0 1 1-112 0m-8 157.7c-10 11.2-16 26.1-16 42.3s6 31.1 16 42.3v-84.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32v-26.8C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416v-21.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32h-64c-17.7 0-32-14.3-32-32m8-328a56 56 0 1 1 112 0a56 56 0 1 1-112 0m120 157.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128a64 64 0 1 1 0-128m-80 272c0 16.2 6 31 16 42.3v-84.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zm64 42.3c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32h-64c-17.7 0-32-14.3-32-32v-42.8c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112"/></svg>
                        </div>
                        <div class="flex items-end text-white">
                            <p class="font-bold text-4xl">
                                {{ $migrantes }}
                            </p>
                            <span>
                                 Migrantes
                            </span>
                        </div>
                    </div>
                </article>
                <article class="w-4/12 border-2 border-dashed border-gray-400 p-4 rounded-lg">
                    <div class="border-2 border-teal-400 w-full h-auto p-4 flex justify-between items-center rounded-md bg-teal-400 dark:text-white">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><circle cx="255.75" cy="56" r="56" fill="#ffffff"/><path fill="#ffffff" d="M310.28 191.4h.05l7.66-2.3l36.79 122.6l46-13.8l-16.21-54.16c0-.12 0-.24-.07-.36l-16.84-56.12l-4.71-15.74l-.9-3H362l-2.51-8.45a44.84 44.84 0 0 0-43-32.08H195.24a44.84 44.84 0 0 0-43 32.08l-2.51 8.45h-.06l-.9 3l-4.71 15.74l-16.84 56.12c0 .12 0 .24-.07.36l-16.21 54.16l46 13.8l36.76-122.6l7.54 2.26L148.25 368h51.5v144h52V368h8v144h52V368h51.51Z"/></svg>
                        </div>
                        <div class="flex items-end text-white">
                            <p class="font-bold text-4xl">
                                {{ $mujeres }}
                            </p>
                            <span>
                                 Mujeres
                            </span>
                        </div>
                    </div>
                </article>
                <article class="w-4/12 border-2 border-dashed border-gray-400 p-4 rounded-lg">
                    <div class="border-2 border-blue-400 w-full h-auto p-4 flex justify-between items-center rounded-md bg-blue-400 dark:text-white">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><circle cx="256" cy="56" r="56" fill="#ffffff"/><path fill="#ffffff" d="M336 128H176a32 32 0 0 0-32 32v160h48V192h8v320h52V328h8v184h52V192h8v128h48V160a32 32 0 0 0-32-32"/></svg>
                        </div>
                        <div class="flex items-end text-white">
                            <p class="font-bold text-4xl">
                                {{ $hombres }}
                            </p>
                            <span>
                                 Hombres
                            </span>
                        </div>
                    </div>
                </article>

            </section>

            {{-- Gráficos --}}
            <section class="flex justify-between space-x-4 mt-6 w-full">
                <article class="w-1/3 border-2 border-dashed border-gray-400 p-4 rounded-lg h-full">
                    <x-chartjs-component :chart="$chartDonut" />
                </article>
                <article class="w-2/3 border-2 border-dashed border-gray-400 p-4 rounded-lg  h-full">
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
