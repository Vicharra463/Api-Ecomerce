<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Carrito;
use App\Models\DetalleDocumento;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = false;

    protected $fillable = [
        'codigo', 'nombre', 'descripcion', 'imagen',
        'precio', 'stock', 'ID_CAT',
        'fecha_registro', 'fecha_actualizacion'
    ];

    // Relación con Categoría (muchos productos pertenecen a una categoría)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_CAT');
    }

    // Relación con Carrito (un producto puede estar en muchos carritos)
    public function carrito()
    {
        return $this->hasMany(Carrito::class, 'ID_PROD');
    }

    // Relación con DetalleDocumento (un producto puede estar en muchos detalles)
    public function detalles()
    {
        return $this->hasMany(DetalleDocumento::class, 'ID_PROD');
    }
}
