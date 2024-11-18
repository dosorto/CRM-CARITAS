<?php

namespace App\Livewire\Actas\ActasEntrega;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\ActaEntrega;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerActasEntrega extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public function infoActa($id)
    {
        // Buscar el acta de entrega por su ID
        $acta = ActaEntrega::with('migrante', 'detalles_acta_entrega.articulo')->findOrFail($id);

        // Recuperar el migrante asociado al acta
        $migrante = $acta->migrante;

        // Obtener los artículos y cantidades desde los detalles del acta
        $articulos = $acta->detalles_acta_entrega->pluck('articulo');
        $cantidades = $acta->detalles_acta_entrega->pluck('cantidad');

        $fecha = $acta->created_at->format('Y-m-d');

        // Guardar en la sesión
        session([
            'migrante' => $migrante,
            'articulos' => $articulos,
            'cantidades' => $cantidades,
            'fecha' => $fecha // Aquí se utiliza el formato correcto
        ]);

        // Redirigir a la ruta donde se mostrará la vista de impresión
        return redirect()->route('info-acta-entrega');
    }


    public function render()
    {
        $actasEntrega = ActaEntrega::with('migrante')->paginate(10);

        return view('livewire.actas.actas-entrega.ver-actas-entrega')
            ->with('items', $actasEntrega);
    }
}
