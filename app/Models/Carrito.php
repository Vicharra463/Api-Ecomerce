<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';
    public $timestamps = false;

    protected $fillable = ['CANTIDAD', 'COD_CLI', 'ID_PROD'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'COD_CLI', 'CODI_CLI');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_PROD');
    }
}
