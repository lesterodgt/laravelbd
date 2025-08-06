<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/local', function () {
    return view('iniciolocal');
});

Route::get('/tailwind', function () {
    return view('tailwind');
});


Route::get('/categorias', [CategoriaController::class, 'index']);

Route::get('/productos', [ProductoController::class, 'ver']);

