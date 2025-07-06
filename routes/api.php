<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ruta predeterminada

// ✅ AÑADE ESTA LÍNEA para cargar tus rutas personalizadas
require __DIR__.'/api/clientes/cliente.php';
require __DIR__.'/api/Productos/productos.php';
require __DIR__.'/api/Categoria/categoria.php';