{{-- Tabla --}}
<main class="flex-grow overflow-hidden flex flex-col">
    <article class="flex-grow overflow-y-auto rounded-lg border-2 border-accent">
        <table class="table table-pin-rows w-full">
            <thead class="text-base">
                <tr class="border-b border-l border-accent bg-accent">
                    @foreach ($colNames as $colName)
                        <th> {{ $colName }} </th>
                    @endforeach
                    <th> Opciones </th>
                </tr>
            </thead>
            <tbody class="text-base">
                @foreach ($items as $item)
                    <tr wire:key="{{ $item->id }}" class="border border-accent">
                        @foreach ($keys as $key)
                            <td>{{ $item->{$key} }}</td>
                        @endforeach
                        <td>
                            Botones
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>

    {{-- Footer fijo en el fondo --}}
    <footer class="h-min py-4 border-t border-accent mb-0">
        {{ $items->links() }}
    </footer>
</main>