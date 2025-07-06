<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Productos\ProductoController;

Route::get('Productos', [ProductoController::class, 'index']);
Route::post('Productos', [ProductoController::class, 'insert']);
