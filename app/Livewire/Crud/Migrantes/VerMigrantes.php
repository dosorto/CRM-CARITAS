<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\On;

#[Layout('components.layouts.no-sidebar')]
class VerMigrantes extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $filtrados;

    // registros por página
    protected $rpp = 20;

    public $texto_busqueda = '';
    public $atributo = 'numero_identificacion';

    public function crear()
    {
        $this->redirectRoute('crear-migrante');
    }

    public function editar($id)
    {
        // dd('funcion editar');
        return redirect()->route('editar-migrante', ['id' => $id]);
        // $this->dispatch('editar-migrante', id: $id)->to(EditarMigrante::class);
    }

    public function buscar()
    {
        $this->resetPage();
        $this->filtrar();
    }

    public function filtrar()
    {
        switch ($this->atributo) {
            case 'nombres':
                return Migrante::where('primer_nombre', 'like', '%' . $this->texto_busqueda . '%')
                    ->orWhere('segundo_nombre', 'like', '%' . $this->texto_busqueda . '%')->paginate($this->rpp);

            case 'apellidos':
                return Migrante::where('primer_apellido', 'like', '%' . $this->texto_busqueda . '%')
                    ->orWhere('segundo_apellido', 'like', '%' . $this->texto_busqueda . '%')->paginate($this->rpp);
        }

        return Migrante::where($this->atributo, 'like', '%' . $this->texto_busqueda . '%')->paginate($this->rpp);
    }

    public function limpiarFiltro()
    {
        $this->texto_busqueda = '';
    }

    public function render()
    {
        $migrantes_filtrados = $this->texto_busqueda == '' ? Migrante::paginate($this->rpp) : $this->filtrar();

        return view('livewire.crud.migrantes.ver-migrantes')
            ->with('datos', $migrantes_filtrados);
    }

    #[On('migrante-eliminado')]
    public function eliminado() {}

    #[On('migrante-editado')]
    public function editado() {}
}
