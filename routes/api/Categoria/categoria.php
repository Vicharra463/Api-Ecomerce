<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Categoria\CategoriaController;

Route::post('Categoria',[CategoriaController::class,'insert']);