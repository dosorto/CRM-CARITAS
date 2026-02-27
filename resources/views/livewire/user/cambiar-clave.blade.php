<div class="flex flex-col min-h-screen w-full p-4">

    <span class="font-bold text-lg pb-4 border-b-2 border-accent mb-4">
        Cambiar Contraseña
    </span>

    <form wire:submit.prevent="verificar" class="flex flex-col">

        <label class="font-semibold mb-2">
            Ingrese su Contraseña Actual
        </label>

        <div class="flex items-center gap-4">
            <input 
                wire:model="password"
                type="password"
                class="bg-accent input w-96"
                placeholder="Escribir aquí..."
                @disabled($verificada)
            >

            @if($verificada)
            <span class="text-success text-xl">
                <span class="icon-[octicon--check-circle-fill-16] size-5 text-success bg-white"></span>
            </span>
            @endif
            @unless($verificada)
            <button type="submit" class="btn btn-success w-max">
                Verificar
            </button>
            @endunless
        </div>

        @error('password')
            <span class="text-error text-sm mt-2 font-semibold">* {{ $message }}</span>
        @enderror
    </form>

    
    
    @if($verificada)
        <hr class="border-2 my-6 border-success rounded">
        <form wire:submit.prevent="cambiarClave" class="flex flex-col w-max">
            <label class="font-semibold mb-1">
                Ingrese una Nueva Contraseña
            </label>
            <input 
                wire:model="newPassword"
                type="password"
                class="bg-accent input w-96 mb-4"
                placeholder="Nueva contraseña..."
            >
            
            <label class="font-semibold mb-1">
                Confirme su Nueva Contraseña
            </label>
            <input 
                wire:model="newPassword_confirmation"
                type="password"
                class="bg-accent input w-96"
                placeholder="Repetir contraseña..."
                >

            @error('newPassword')
                <span class="text-error text-sm mt-2 font-semibold">* {{ $message }}</span>
            @enderror
            
            <button type="submit" class="mt-4 btn btn-success w-max">
                <span wire:loading class="loading loading-spinner loading-sm"></span>
                <span wire:loading.remove class="icon-[material-symbols--save] size-5"></span>
                Guardar
            </button>
            
        </form>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success mt-6">
            {{ session('success') }}
        </div>
    @endif

</div>