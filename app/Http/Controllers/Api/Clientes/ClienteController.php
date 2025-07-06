<?php

namespace App\Http\Controllers\Api\Clientes;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController
{
    //ver todos los clientes
    public function index()
    {
        $clientes = Cliente::all();

        if ($clientes->isEmpty()) {
            return response()->json([
                'Response' => 'No se encontraron clientes',
                'Status' => 404
            ], 404);
        }

        return response()->json([
            'Response' => 'Clientes cargados correctamente',
            'Status' => 200,
            'Data' => $clientes
        ], 200);
    }

    //insertar los clientes con la validacion del store del request

    public function insert(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        $data = [
            'Response' => 'Cliente creado correctamente',
            'Status' => 201,
            'Data' => $cliente
        ];

        return response()->json($data, 201);
    }

    //validar los el codigo para poder actualizar el cliente
    public function update(UpdateClienteRequest $request, $CODI_CLI)
    {
        $cliente = Cliente::find($CODI_CLI);

        if (!$cliente) {
            return response()->json([
                'Response' => 'Cliente no encontrado',
                'Status' => 404
            ], 404);
        }

        $cliente->update($request->validated());

        $data = [
            'Response' => 'Cliente actualizado correctamente',
            'Status' => 200,
            'Data' => $cliente
        ];

        return response()->json($data, 200);
    }

    //eliminar el cliente por codigo
    public function delete($CODI_CLI)
    {
        $cliente = Cliente::find($CODI_CLI);

        if (!$cliente) {
            return response()->json([
                'Response' => 'Cliente no encontrado',
                'Status' => 404
            ], 404);
        }

        $cliente->delete();

        return response()->json([
            'Response' => 'Cliente eliminado correctamente',
            'Status' => 200
        ], 200);
    }

    //mostar cliente por codigo
    public function show($CODI_CLI)
    {
        $cliente = Cliente::find($CODI_CLI);

        if (!$cliente) {
            return response()->json([
                'Response' => 'Cliente no encontrado',
                'Status' => 404
            ], 404);
        }

        $data = [
            'Response' => 'Cliente encontrado',
            'Status' => 200,
            'Data' => $cliente
        ];

        return response()->json($data, 200);
    }
}
