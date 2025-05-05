<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evidencia;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'reporte_id' => 'required|exists:reportes,id',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $fileName, 'public');

            // Guardar en la base de datos
            Evidencia::create([
                'reporte_id' => $request->input('reporte_id'),
                'archivo' => $path, // esto será 'uploads/filename.ext'
            ]);

            return response()->json(['message' => 'Archivo cargado correctamente', 'file' => $fileName], 200);
        }

        return response()->json(['message' => 'No se ha cargado ningún archivo'], 400);
    }
}
