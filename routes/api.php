<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ruta predeterminada
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ✅ AÑADE ESTA LÍNEA para cargar tus rutas personalizadas
require __DIR__.'/api/clientes/cliente.php';
