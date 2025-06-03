<?php

namespace App\Http\Controllers;

class RegistrosController extends Controller
{
    public function descargar($filename)
    {
        $path = storage_path('app/public/exports/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
