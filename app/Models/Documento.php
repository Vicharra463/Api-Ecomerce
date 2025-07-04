<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $primaryKey = 'COD_PED';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'COD_CLIE', 'PRE_TOTAL', 'Tipo',
        'Fecha_Registro', 'Fecha_Actualizacion'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'COD_CLIE', 'CODI_CLI');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleDocumento::class, 'COD_PEDI', 'COD_PED');
    }
}
