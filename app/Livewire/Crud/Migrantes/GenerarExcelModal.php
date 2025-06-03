<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Expediente;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GenerarExcelModal extends Component
{
    public $tipoRangoFechas = 'all';
    public $fechaInicio;
    public $fechaFinal;

    public function generar()
    {
        switch ($this->tipoRangoFechas) {
            case 'all':
                $this->descargarExcel(Expediente::all());
                break;
            case 'month':
                $this->descargarExcel(Expediente::whereMonth('fecha_ingreso', date('m'))->get());
                break;
            case 'day':
                $this->descargarExcel(Expediente::whereDay('fecha_ingreso', date('d'))->get());
                break;
            case 'dates':
                $this->descargarExcel(Expediente::whereBetween('fecha_ingreso', [$this->fechaInicio, $this->fechaFinal])->get());
                break;
        }
    }

    public function descargarExcel($expedientes)
    {
        $spreadsheet = IOFactory::load(base_path('registros/plantilla/plantilla_registro_atenciones.xlsx'));
        $hoja = $spreadsheet->getSheetByName('Migrantes');
        $row = 11;

        foreach ($expedientes as $expediente) {
            $hoja->setCellValue('A' . $row, $row - 10);
            $hoja->setCellValue('B' . $row, $expediente->migrante->primer_nombre);
            $row++;
        }
        $blueBorders = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF4472C4'],
                ],
            ],
        ];
        $orangeBorders = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FFED7D31'],
                ],
            ],
        ];
        $hoja->getStyle('A11:L' . $row - 1)->applyFromArray($blueBorders);
        $hoja->getStyle('M11:Z' . $row - 1)->applyFromArray($orangeBorders);


        $filename = 'registros_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        // $filepath = base_path('registros/' . $filename);
        $filepath = storage_path('app/public/exports/' . $filename);

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filepath);

        $this->dispatch('descargarArchivo', route('descargar.registros', ['filename' => $filename]));
    }

    public function render()
    {
        return view('livewire.crud.migrantes.generar-excel-modal');
    }
}
