<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Actas de Entrega</h1>
        <div>
            Cosas aparte...
        </div>
    </header>

    {{-- Tabla --}}
    <main class="flex-grow overflow-hidden flex flex-col mt-8">
        <article class="flex-grow overflow-y-auto rounded-lg border-2 border-accent">
            <table class="table table-pin-rows w-full table-sm">
                <thead class="text-base">
                    <tr class="border-b border-l border-accent bg-accent">
                        <th> Identificación </th>
                        <th> Nombre del Migrante </th>
                        <th> Fecha </th>
                        <th> Opciones </th>
                    </tr>
                </thead>
                <tbody class="text-base">
                    @foreach ($items as $item)
                        <tr wire:key="{{ $item->id }}" class="border border-accent">

                            <td>
                                {{ $item->migrante->numero_identificacion }}
                            </td>
                            <td>
                                {{ 
                                    $item->migrante->primer_nombre . ' ' . 
                                    $item->migrante->segundo_nombre . ' ' . 
                                    $item->migrante->primer_apellido . ' ' . 
                                    $item->migrante->segundo_apellido
                                }}
                            </td>
                            <td>
                                {{ $item->created_at->format('Y-m-d') }}
                            </td>
                            
                            <td class="flex gap-2">
                                <button wire:click="infoActa( {{ $item->id }} )" class="btn btn-accent btn-sm text-base-content">
                                    <span class="icon-[flowbite--info-circle-solid] size-4"></span>
                                    Detalles
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>

        {{-- Footer fijo en el fondo --}}
        <footer class="py-4 border-t border-accent mb-0">
            {{ $items->links() }}
        </footer>
    </main>

</div>
