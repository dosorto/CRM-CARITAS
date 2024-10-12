<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class PasswordRecovery extends Component
{

    public $email;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
    ];

    public function render()
    {
        return view('livewire.password-recovery');
    }

    public function sendPasswordResetLink()
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('message', 'Se ha enviado un enlace de restablecimiento a tu correo.');
        } else {
            session()->flash('error', 'Error al enviar el enlace. Inténtalo de nuevo.');
        }
    }
}
