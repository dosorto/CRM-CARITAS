{{-- Tabla --}}
<main class="flex-grow overflow-hidden flex flex-col">
    <article class="flex-grow overflow-y-auto rounded-lg border-2 border-accent">
        <table class="table table-pin-rows w-full">
            <thead class="text-base">
                <tr class="border-b border-l border-accent bg-accent">
                    @foreach ($colNames as $colName)
                        <th wire:key="TableColName-{{$colName}}">
                            {{ $colName }}
                        </th>
                    @endforeach
                    <th> Opciones </th>
                </tr>
            </thead>
            <tbody class="text-base">
                @foreach ($items as $item)
                    <tr wire:key="{{ $item->id }}" class="border border-accent">
                        @foreach ($keys as $key)
                            @php
                                // Separar los niveles de relación, ej: 'pais.nombre_pais'
                                $keyParts = explode('.', $key);
                                $value = $item;

                                // Iterar sobre las partes del key para llegar al valor final
                                foreach ($keyParts as $part) {
                                    if ($value) {
                                        $value = $value->{$part};
                                    }
                                }
                            @endphp
                            <td wire:key="{{$item->id}}-{{$key}}">{{ $value }}</td>
                        @endforeach
                        <td class="flex gap-2">
                            @foreach ($actions as $action)
                                <livewire:dynamic-component
                                    :key="$action['name'] . '-' . $item->id"
                                    :component="$action['component']"
                                    :parameters="array_merge(['item' => $item], $action['parameters'] ?? [])"/>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>

    {{-- Footer fijo en el fondo --}}
    <footer class="py-4 border-accent mb-0">
        {{ $items->links() }}
    </footer>
</main>
