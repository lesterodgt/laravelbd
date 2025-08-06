<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronica = Categoria::where('nombre', 'Electrónica')->first();
        $ropa = Categoria::where('nombre', 'Ropa')->first();
        $hogar = Categoria::where('nombre', 'Hogar')->first();

        $electronica->productos()->createMany([
            ['nombre' => 'Laptop', 'precio' => 1500, 'stock' => 10]
        ]);

        $ropa->productos()->createMany([
            ['nombre' => 'Camiseta', 'precio' => 20, 'stock' => 50],
            ['nombre' => 'Pantalón', 'precio' => 35, 'stock' => 30],
        ]);

        $hogar->productos()->createMany([
            ['nombre' => 'Sartén', 'precio' => 15, 'stock' => 40],
            ['nombre' => 'Cafetera', 'precio' => 45, 'stock' => 15],
        ]);

    }
}
