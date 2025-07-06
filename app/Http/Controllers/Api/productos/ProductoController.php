<?php

namespace App\Http\Controllers\Api\Productos;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Requests\insetProductRequest;

class ProductoController
{
    public function insert(insetProductRequest $request){
     
        $producto = Producto::create($request -> validated());

         $data = [
            'Message' => "Producto creado con exito",
            'Status' => '201',
            'data' => $producto
         ];
 
         return response() -> json($data , 201);

    }

    public function show($codigo){

      $producto = Producto::find($codigo);
        
      $data = [
        'Message' => 'Producto econtrado',
        'Status' => '200',
        'Data' => $producto
      ];
      
      return response() -> json($data , 200);
    }
}
