<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.empty')]
class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended('/inicio'); // Cambia '/dashboard' por la ruta deseada
        } else {
            session()->flash('error', 'Credenciales incorrectas.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
