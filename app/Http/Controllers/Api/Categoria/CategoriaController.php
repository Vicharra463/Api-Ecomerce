<?php

namespace App\Http\Controllers\Api\Categoria;

use App\Http\Requests\InsertCategori;
use App\Models\Categoria;

class CategoriaController
{
    public function insert(InsertCategori $request){
     
       $categoria = Categoria::create($request -> validated());
    
       $data = [
        'Message' => 'Categoria Registrada',
        'status' => '201',
         'Data' => $categoria
       ];
        
       return response()-> json($data , 201);
    }

}
