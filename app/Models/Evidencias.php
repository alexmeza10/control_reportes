<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Report;

class Evidencia extends Model
{
    protected $fillable = ['reporte_id', 'ruta', 'nombre'];

    public function reporte()
    {
        return $this->belongsTo(Report::class);
    }
}
