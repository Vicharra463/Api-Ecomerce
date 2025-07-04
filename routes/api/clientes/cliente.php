<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Clientes\ClienteController;

Route::get('clientes', [ClienteController::class, 'index']);
Route::post('clientes', [ClienteController::class, 'insert']);
Route::put('clientes/{CODI_CLI}', [ClienteController::class, 'update']);
Route::delete('clientes/{CODI_CLI}', [ClienteController::class, 'delete']);
Route::get('clientes/{CODI_CLI}', [ClienteController::class, 'show']);