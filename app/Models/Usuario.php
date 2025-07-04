<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    public $timestamps = false;

    protected $fillable = [
        'Nombre', 'password', 'Rol', 'COD_CLI',
        'Fecha_Registro', 'Fecha_Actualizacion'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'COD_CLI', 'CODI_CLI');
    }
}

