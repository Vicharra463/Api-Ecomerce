<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    public $timestamps = false;

    protected $fillable = ['nombre', 'descripcion', 'fecha_registro', 'fecha_actualizacion'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'ID_CAT');
    }
}
