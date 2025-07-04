<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleDocumento extends Model
{
    protected $table = 'detalle_documentos';
    public $timestamps = false;

    protected $fillable = [
        'CANTIDAD', 'COD_PEDI', 'ID_PROD',
        'PRECIO_CANT', 'TOTAL',
        'Fecha_Registro', 'Fecha_Actualizacion'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_PROD');
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'COD_PEDI', 'COD_PED');
    }
}
