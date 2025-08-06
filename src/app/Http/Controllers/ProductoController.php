<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function ver(){
        $productos = Producto::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

}
