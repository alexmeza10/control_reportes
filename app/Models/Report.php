<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

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

    public function getNombreStatusAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'Abierto';
            case 2:
                return 'En espera de partes';
            case 3:
                return 'Cerrado';
            default:
                return 'Desconocido';
        }
    }

    public function getIconoStatusAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'ki-file-added';
            case 2:
                return 'ki-add-files';
            case 3:
                return 'ki-file-deleted';
            default:
                return 'ki-file-added';
        }
    }

    public function getColorStatusAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'text-success';
            case 2:
                return 'text-delete';
            case 3:
                return 'text-danger';
            default:
                return 'text-warning';
        }
    }

    public function getHashidAttribute()
    {
        $hashids = new Hashids('rwDsgFI47h0QU9TntnpVZ5R4IBMtftUI', 10);
        return $hashids->encode($this->id);
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class);
    }
}
