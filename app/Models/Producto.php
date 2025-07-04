<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = false;

    protected $fillable = [
        'codigo', 'nombre', 'descripcion', 'imagen',
        'precio', 'stock', 'ID_CAT',
        'fecha_registro', 'fecha_actualizacion'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_CAT');
    }

    public function carrito()
    {
        return $this->hasMany(Carrito::class, 'ID_PROD');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleDocumento::class, 'ID_PROD');
    }
}
