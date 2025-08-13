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


//Route::get('/categorias', [CategoriaController::class, 'index']);
Route::resource('categorias', CategoriaController::class);



Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

//Route::resource('productos', ProductoController::class);
