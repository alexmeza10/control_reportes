<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;


    protected $table = 'reportes'; 


    protected $fillable = [
        'nombre',
        'dependencia',
        'ext',
        'mail',
        'num_empleado',
        'subject',
        'user_id',
        'description',
        'ubicacion',
        'status',
        'notificar_correo', 
        'evidencias', 
    ];

    protected $casts = [
        'evidencias' => 'array',
    ];
}
