<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'archivo' => ['required','file','max:2048'], // ~2MB
        ]);

        // Guarda en storage/app/public/avatars con nombre hash
        $path = $request->file('archivo')->store('avatars', 'public');

        return back()->with('path', $path);
    }










    public function storeprivate(Request $request)
    {
        $request->validate([
            'archivo' => ['required','file','max:2048'], // ~2MB
        ]);

        $path = $request->file('archivo')->store('reportes', 'local'); // storage/app/reportes/...
        $nombre = $request->file('archivo')->getClientOriginalName() ?: 'sinnombre';

         /** @var FilesystemAdapter $disk */
         $disk = Storage::disk('local');
        return $disk->download($path, $nombre);
    }
}
