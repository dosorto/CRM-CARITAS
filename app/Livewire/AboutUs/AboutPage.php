<?php

namespace App\Livewire\AboutUs;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;

#[Layout('layouts.empty')]
#[Lazy()]
class AboutPage extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center bg-white">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public $devs = [
        [
            'foto' => '/img/devs/Mario.jpg',
            'nombre' => 'Mario Fernando Carbajal Galo',
            'descripcion' => 'Estudiante de la carrera de Ingeniería en Sistemas',
            'lugar' => 'UNAH - Campus Choluteca',
            'linkedin' => 'https://www.linkedin.com/in/mario-carbajal-264710215/'
        ],
        [
            'foto' => '/img/devs/Ingrid.jpg',
            'nombre' => 'Ingrid Geraldina Baquedano Lozano',
            'descripcion' => 'Estudiante de la carrera de Ingeniería en Sistemas',
            'lugar' => 'UNAH - Campus Choluteca',
            'linkedin' => 'https://www.linkedin.com/in/ingrid-geraldina-baquedano-lozano-a81b642b0/'
        ],
        [
            'foto' => '/img/devs/Jorlin.jpg',
            'nombre' => 'Jorlin Fernando Rosa Arrivillaga',
            'descripcion' => 'Estudiante de la carrera de Ingeniería en Sistemas',
            'lugar' => 'UNAH - Campus Choluteca',
            'linkedin' => 'https://www.linkedin.com/in/jorlin-fernando-rosa-arrivillaga-a512892b1/'
        ],
        [
            'foto' => '/img/devs/Fernanda.jpg',
            'nombre' => 'Fernanda Sarahí Betancourth Barahona',
            'descripcion' => 'Estudiante de la carrera de Ingeniería en Sistemas',
            'lugar' => 'UNAH - Campus Choluteca',
            'linkedin' => 'https://www.linkedin.com/in/fernanda-betancourth-3134322b1/'
        ],
        [
            'foto' => '/img/devs/Dacia.jpg',
            'nombre' => 'Dacia Lisbeth Espinoza Portillo',
            'descripcion' => 'Estudiante de la carrera de Ingeniería en Sistemas',
            'lugar' => 'UNAH - Campus Choluteca',
            'linkedin' => 'https://www.linkedin.com/in/dacia-lisbeth-espinoza-portillo-655116212/'
        ],
        [
            'foto' => '/img/devs/Cristhian.jpg',
            'nombre' => 'Cristhian Enrique Ávila Sauceda',
            'descripcion' => 'Diseñador Gráfico y Estudiante de la carrera de Ingeniería en Sistemas',
            'lugar' => 'UNAH - Campus Choluteca',
            'linkedin' => 'https://www.linkedin.com/in/cristhian-avila-455a63138/'
        ],
    ];

    public function render()
    {
        return view('livewire.about-us.about-page');
    }
}
