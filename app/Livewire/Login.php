<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.empty')]
class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }
}
