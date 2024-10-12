<?php


namespace App\Livewire\Layout;

use Livewire\Component;
use App\Livewire\Actions\Logout;

class SideBar extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.layout.side-bar');
    }
}
