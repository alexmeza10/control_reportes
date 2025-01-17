<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240', // Máx. 10 MB
        ]);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public');
    
            return response()->json(['message' => 'Archivo cargado correctamente', 'file' => $fileName], 200);
        }
    
        return response()->json(['message' => 'No se ha cargado ningún archivo'], 400);
    }    
}
