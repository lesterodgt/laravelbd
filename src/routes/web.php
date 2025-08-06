<?php

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
