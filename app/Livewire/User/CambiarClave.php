<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Lazy;

#[Lazy()]
class CambiarClave extends Component
{
    public $password;
    public $newPassword;
    public $newPassword_confirmation;

    public $verificada = false;

    public function render()
    {
        return view('livewire.user.cambiar-clave');
    }

    public function verificar()
    {
        $this->validate([
            'password' => 'required'
        ]);

        /** @var User $user */
        $user = Auth::user();

        if (!Hash::check($this->password, $user->password)) {
            $this->addError('password', 'La contraseña actual no es correcta.');
            return;
        }

        $this->verificada = true;
    }

    public function cambiarClave()
    {
        $this->validate([
            'newPassword' => 'required|min:4|confirmed'
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->update([
            'password' => Hash::make($this->newPassword)
        ]);

        Auth::logoutOtherDevices($this->newPassword);

        session()->flash('success', 'Contraseña actualizada correctamente.');

        // Resetear estado
        $this->reset(['password', 'newPassword', 'newPassword_confirmation']);
        $this->verificada = false;
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }
}
