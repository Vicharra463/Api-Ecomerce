<?php

namespace App\Http\Controllers\Api\Clientes;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ClienteController
{
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

    public function insert(Request $request)
    {

        $validador = Validator::make($request->all(), [
            'Nombre' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255',
            'Razon_Social' => 'required|string|max:255',
            'RUC' => 'required|string|max:255',
            'Telefono' => 'required|string|max:255',
        ]);

        if ($validador->fails()) {
            return response()->json([
                'Response' => 'Error de validación',
                'Status' => 422,
                'Errors' => $validador->errors()
            ], 422);
        }

        $cliente = Cliente::create($request->all());

        $data = [
            'Response' => 'Cliente creado correctamente',
            'Status' => 201,
            'Data' => $cliente
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $CODI_CLI)
    {
        $cliente = Cliente::find($CODI_CLI);

        if (!$cliente) {
            return response()->json([
                'Response' => 'Cliente no encontrado',
                'Status' => 404
            ], 404);
        }

        $validador = Validator::make($request->all(), [
            'Nombre' => 'string|max:255',
            'Direccion' => 'string|max:255',
            'Email' => 'string|email|max:255',
            'Razon_Social' => 'string|max:255',
            'RUC' => 'string|max:255',
            'Telefono' => 'string|max:255',
        ]);

        if ($validador->fails()) {
            return response()->json([
                'Response' => 'Error de validación',
                'Status' => 422,
                'Errors' => $validador->errors()
            ], 422);
        }

        $cliente->update($request->all());

        return response()->json([
            'Response' => 'Cliente actualizado correctamente',
            'Status' => 200,
            'Data' => $cliente
        ], 200);
    }

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

    public function show($CODI_CLI)
    {
        $cliente = Cliente::find($CODI_CLI);

        if (!$cliente) {
            return response()->json([
                'Response' => 'Cliente no encontrado',
                'Status' => 404
            ], 404);
        }

        return response()->json([
            'Response' => 'Cliente encontrado',
            'Status' => 200,
            'Data' => $cliente
        ], 200);
    }
}
