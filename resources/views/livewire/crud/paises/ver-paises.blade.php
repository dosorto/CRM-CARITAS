<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-[10%] flex justify-between items-center border-b-2 border-gray-300">
        <h1 class="text-xl font-bold">Paises</h1>
        <div>
            Apartados Extra
        </div>
    </header>
    <div class="flex flex-col h-[90%]">
        <main class="flex-grow overflow-hidden">
            <div class="h-full flex flex-col">

                {{-- Contenedor encima de la tabla --}}
                <section class="flex flex-row justify-between py-4">
                    {{-- Buscador --}}
                    <div class="join">
                        <select class="select join-item w-full">
                            <option value="nombre">Nombre</option>
                            <option value="codigo_iso">Código</option>
                        </select>
                        <input class="input join-item" placeholder="Buscar..." />
                    </div>
                    {{-- Botones --}}
                    <div class="join">
                        <livewire:crud.paises.crear-pais-modal />    
                    </div>
                </section>

                {{-- Tabla --}}
                <article class="flex-grow overflow-y-auto rounded-xl border-2">
                    <table class="table table-pin-rows">
                        <thead class="text-lg">
                            <tr>
                                <th>A</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <tr>
                                <td>Ant-Man</td>
                            </tr>
                            <!-- Repeat rows as needed -->
                        </tbody>
                    </table>
                </article>
            </div>
        </main>
        <footer class="mt-auto h-auto py-4">
            Paginación
        </footer>
    </div>
</div>
