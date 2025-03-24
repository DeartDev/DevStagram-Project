<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        // ✅ Validar que el archivo sea una imagen permitida
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
        ]);

        // ✅ Crear el manejador de imágenes con el Driver GD
        $manager = new ImageManager(new Driver());

        // ✅ Obtener la imagen del request
        $imagen = $request->file('file');

        // ✅ Generar un nombre único para la imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        // ✅ Leer la imagen con Intervention Image
        $imagenServidor = $manager->read($imagen);

        // ✅ Redimensionar la imagen a 1000x1000 píxeles
        $imagenServidor->scale(1000, 1000);

        // ✅ Definir la ruta donde se guardará la imagen
        $rutaCarpeta = public_path('uploads');

        // ✅ Crear la carpeta 'uploads' si no existe
        if (!file_exists($rutaCarpeta)) {
            mkdir($rutaCarpeta, 0755, true);
        }

        // ✅ Ruta completa de la imagen
        $imagenesPath = $rutaCarpeta . '/' . $nombreImagen;

        // ✅ Guardar la imagen en el servidor
        $imagenServidor->save($imagenesPath);

        // ✅ Retornar el nombre de la imagen en formato JSON
        return response()->json(['imagen' => $nombreImagen]);
    }
}
