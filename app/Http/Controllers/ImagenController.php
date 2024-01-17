<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ImagenController extends Controller
{
    public function store(Request $request){
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        // read image from file system
        $image = $manager->read($imagen);
        $imagen_path = public_path('uploads'.'/'.$nombreImagen);
        $image->save($imagen_path);

        return response()->json(['imagen'=>$nombreImagen]);
    }
}
