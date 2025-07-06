<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'CODI_CLI';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Direccion',
        'Email',
        'Razon_Social',
        'RUC',
        'Telefono',
        'Fecha_Registro',
        'Fecha_Actualizacion'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'COD_CLI', 'CODI_CLI');
    }

    public function carrito()
    {
        return $this->hasMany(Carrito::class, 'COD_CLI', 'CODI_CLI');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'COD_CLIE', 'CODI_CLI');
    }
}
