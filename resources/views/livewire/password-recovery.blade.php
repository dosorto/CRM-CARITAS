<div>
    <form wire:submit.prevent="sendPasswordResetLink">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" wire:model="email" class="form-control" id="email" placeholder="Ingresa tu correo">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar enlace de recuperación</button>
    </form>
</div>
