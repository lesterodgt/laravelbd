<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PersonajeController extends Controller
{
    public function index()
    {
        $personajes = Personaje::latest()->get();

        return view('personajes.index', compact('personajes'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'         => ['required','string','max:255'],
            'foto_publica'   => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],
            'foto_privada'   => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],
        ]);

        $publicPath = null;
        $privatePath = null;

        if ($request->hasFile('foto_publica')) {
            // Guarda pública en disco 'public' => public/storage/...
            $publicPath = $request->file('foto_publica')->store('personajes/public', 'public');
        }

        if ($request->hasFile('foto_privada')) {
            // Guarda privada en disco 'local' => storage/app/...
            $privatePath = $request->file('foto_privada')->store('personajes/private', 'local');
        }

        $personaje = Personaje::create([
            'nombre' => $data['nombre'],
            'foto_publica_path' => $publicPath,
            'foto_privada_path' => $privatePath,
        ]);

        return redirect()->route('personajes.index')->with('ok', 'Personaje creado.');
    }

    public function edit(Personaje $personaje)
    {
        return view('personajes.form', compact('personaje'));
    }

    public function downloadPrivada(Personaje $personaje)
    {
        abort_unless($personaje->foto_privada_path && Storage::disk('local')->exists($personaje->foto_privada_path), 404);

        // Nombre sugerido de descarga
        $ext = pathinfo($personaje->foto_privada_path, PATHINFO_EXTENSION);
        $safeName = Str::slug($personaje->nombre ?: 'personaje') . '-privada.' . ($ext ?: 'jpg');

        return Storage::disk('local')->download($personaje->foto_privada_path, $safeName);
    }

    public function update(Request $request, Personaje $personaje)
    {
        $data = $request->validate([
            'nombre'         => ['required','string','max:255'],
            'foto_publica'   => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],
            'foto_privada'   => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],
        ]);

        // Reemplazar foto pública (borrar la anterior si sube nueva)
        if ($request->hasFile('foto_publica')) {
            if ($personaje->foto_publica_path) {
                Storage::disk('public')->delete($personaje->foto_publica_path);
            }
            $personaje->foto_publica_path = $request->file('foto_publica')->store('personajes/public', 'public');
        }

        // Reemplazar foto privada (borrar la anterior si sube nueva)
        if ($request->hasFile('foto_privada')) {
            if ($personaje->foto_privada_path) {
                Storage::disk('local')->delete($personaje->foto_privada_path);
            }
            $personaje->foto_privada_path = $request->file('foto_privada')->store('personajes/private', 'local');
        }

        $personaje->nombre = $data['nombre'];
        $personaje->save();

        return redirect()->route('personajes.index')->with('ok', 'Personaje actualizado.');
    }

}
