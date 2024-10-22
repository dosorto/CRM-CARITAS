<div class="flex">

    <div class="join w-full">
        <select wire:model.live="colSelected" class="select join-item w-min bg-accent">
            @foreach ($fakeColNames as $key => $value)
                <option value="{{ $key }}">{{ $key }}</option>
            @endforeach
        </select>
        <label class="w-full input join-item bg-neutral border-2 border-accent input-bordered flex items-center justify-between gap-2">
            <input wire:model.live="textToFind" placeholder="Buscar..." type="text" />
        
            {{-- Lógica para mostrar el ícono de carga o el ícono de búsqueda --}}
            <span wire:loading.remove class="icon-[map--search] size-5 text-gray-400"></span>
            <span wire:loading class="loading loading-dots loading-md"></span>
            {{-- <span class="loading loading-dots loading-md"></span> --}}
        </label>
        

    </div>
</div>
