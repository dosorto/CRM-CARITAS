<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Expediente;
use App\Models\Pais;
use Exception;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GenerarExcelModal extends Component {
    public $tipoRangoFechas = 'all';
    public $fechaInicio;
    public $fechaFinal;

    public function generar() {
        switch ($this->tipoRangoFechas) {
            case 'all':
                $this->descargarExcel(Expediente::all());
                break;
            case 'year':
                $this->descargarExcel(Expediente::whereYear('fecha_ingreso', date('Y'))->get());
                break;
            case 'month':
                $this->descargarExcel(Expediente::whereMonth('fecha_ingreso', date('m'))->whereYear('fecha_ingreso', date('Y'))->get());
                break;
            case 'day':
                $this->descargarExcel(Expediente::whereDate('fecha_ingreso', today())->get());
                break;
            case 'dates':

                if ($this->fechaInicio == null || $this->fechaFinal == null) {
                    $this->addError('excel-error', 'Ingrese ambas fechas.');
                    return;
                }
                if ($this->fechaInicio > $this->fechaFinal) {
                    $this->addError('excel-error', 'La fecha inicial no puede ser mayor.');
                    return;
                }
                $this->descargarExcel(
                    Expediente::whereBetween('fecha_ingreso', [$this->fechaInicio, $this->fechaFinal])->get()
                );
                break;
        }
    }

    public function descargarExcel($expedientes) {
        if ($expedientes->isEmpty()) {
            $this->addError('excel-error', 'No se encontraron expedientes.');
            return;
        }
        $expedientes = $expedientes->sortByDesc('fecha_ingreso');

        $spreadsheet = IOFactory::load(base_path('registros/plantilla/plantilla_registro_atenciones.xlsx'));
        $hoja = $spreadsheet->getSheetByName('Migrantes');
        $row = 11;

        foreach ($expedientes as $expediente) {
            // Datos Personales
            $hoja->setCellValue('A' . $row, $row - 10);
            $nombre =
                $expediente->migrante->primer_nombre . ' ' .
                $expediente->migrante->segundo_nombre . ' ' .
                $expediente->migrante->primer_apellido . ' ' .
                $expediente->migrante->segundo_apellido . ' ';
            $nombreCompleto = str_replace('  ', ' ', $nombre);
            $hoja->setCellValue('B' . $row, $nombreCompleto);
            $hoja->setCellValueExplicit('C' . $row, $expediente->migrante->numero_identificacion, DataType::TYPE_STRING);
            $hoja->setCellValue('D' . $row, $expediente->migrante->tipo_identificacion);
            $hoja->setCellValue('E' . $row, Pais::find($expediente->migrante->pais_id)->nombre_pais);
            $hoja->setCellValue('F' . $row, $expediente->migrante->sexo);
            $hoja->setCellValue('G' . $row, $expediente->migrante->fecha_nacimiento->format('d/m/Y'));
            $hoja->setCellValue('H' . $row, now()->diff($expediente->migrante->fecha_nacimiento)->y);
            $hoja->setCellValue('I' . $row, $expediente->migrante->estado_civil);
            $hoja->setCellValue('J' . $row, $expediente->migrante->codigo_familiar);
            $hoja->setCellValue('K' . $row, $expediente->migrante->es_lgbt ? 'Si' : 'No');
            $hoja->setCellValue('L' . $row, $expediente->migrante->tipo_sangre);

            // Expediente
            $hoja->setCellValue('M' . $row, $expediente->situacionMigratoria->situacion_migratoria);
            $hoja->setCellValue('N' . $row, $expediente->frontera->frontera);
            $hoja->setCellValue('O' . $row, $expediente->asesorMigratorio->asesor_migratorio);
            $hoja->setCellValue('P' . $row, $expediente->fecha_ingreso->format('d/m/Y'));
            $hoja->setCellValue('Q' . $row, $expediente->fecha_salida ? $expediente->fecha_salida->format('d/m/Y') : '');

            $hoja->setCellValue('R' . $row, implode(', ', $expediente->motivosSalidaPais->pluck('motivo_salida_pais')->toArray()));
            $hoja->setCellValue('S' . $row, implode(', ', $expediente->necesidades->pluck('necesidad')->toArray()));
            $hoja->setCellValue('T' . $row, implode(', ', $expediente->discapacidades->pluck('discapacidad')->toArray()));

            $hoja->setCellValue('U' . $row, $expediente->fallecimiento ? 'Si' : '');
            $hoja->setCellValue('V' . $row, $expediente->atencion_psicologica ? 'Si' : 'No');
            $hoja->setCellValue('W' . $row, $expediente->asesoria_psicologica ? 'Si' : 'No');
            $hoja->setCellValue('X' . $row, $expediente->atencion_legal ? 'Si' : 'No');
            $hoja->setCellValue('Y' . $row, $expediente->asesoria_psicosocial ? 'Si' : 'No');
            $hoja->setCellValue('Z' . $row, $expediente->observacion);

            $row++;
        }

        // EXTENDER LA TABLA PRIMERO
        $tables = $hoja->getTableCollection();
        if (count($tables) > 0) {
            foreach ($tables as $table) {
                $tableRange = $table->getRange();
                preg_match('/([A-Z]+)\d+:([A-Z]+)\d+/', $tableRange, $matches);
                $startCol = $matches[1];
                $endCol = $matches[2];
                $newRange = $startCol . '10:' . $endCol . ($row - 1);
                $table->setRange($newRange);
            }
        }

        // APLICAR BORDES FILA POR FILA
        $blueBorderBottom = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF4472C4'],
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $orangeBorderBottom = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FFED7D31'],
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        for ($i = 11; $i < $row; $i++) {
            $hoja->getStyle('A' . $i . ':L' . $i)->applyFromArray($blueBorderBottom);
            $hoja->getStyle('M' . $i . ':Z' . $i)->applyFromArray($orangeBorderBottom);
        }


        // ESTABLECER ALTURA DE FILAS (duplicar la altura por defecto)
        $alturaBase = $hoja->getRowDimension(11)->getRowHeight();
        // Si getRowHeight() retorna -1, significa que usa la altura por defecto
        if ($alturaBase == -1) {
            $alturaBase = $hoja->getDefaultRowDimension()->getRowHeight();
            if ($alturaBase == -1) {
                $alturaBase = 15; // Altura por defecto de Excel si no está especificada
            }
        }
        $nuevaAltura = $alturaBase * 1.5;
        for ($i = 11; $i < $row; $i++) {
            $hoja->getRowDimension($i)->setRowHeight($nuevaAltura);
        }



        $cols = ['B', 'C', 'M', 'N', 'O', 'R', 'S', 'T', 'Z'];
        foreach ($cols as $col) {
            $hoja->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = 'registros_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        $filepath = storage_path('app/public/exports/' . $filename);

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filepath);

        $this->dispatch('descargarArchivo', route('descargar.registros', ['filename' => $filename]));
    }

    public function render() {
        return view('livewire.crud.migrantes.generar-excel-modal');
    }
}
