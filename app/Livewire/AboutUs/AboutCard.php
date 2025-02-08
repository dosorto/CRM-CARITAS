<?php

namespace App\Livewire\AboutUs;

use Livewire\Component;

class AboutCard extends Component
{
    public $foto;
    public $nombre;
    public $descripcion;
    public $lugar;
    public $linkedin;

    public function mount($foto, $nombre, $descripcion, $lugar, $linkedin)
    {   
        $this->foto = $foto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->lugar = $lugar;
        $this->linkedin = $linkedin;
    }
    public function render()
    {
        return view('livewire.about-us.about-card');
    }
}
