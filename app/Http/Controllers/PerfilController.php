<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request){
        $request->request->add([
            'username'=> Str::slug($request->username)
        ]);

        $this->validate($request,[
            'username' => 'required|min:3|max:20|unique:users,username,'.auth()->user()->id.'|not_in:editar-perfil,something else'
        ]);

        if($request->imagen){
            if(auth()->user()->imagen && File::exists(public_path('perfiles/'.auth()->user()->imagen))){
                unlink(public_path('perfiles/'.auth()->user()->imagen));
            }

            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            // read image from file system
            $image = $manager->read($imagen);
            $image->cover(500, 500, 'center');
            $imagen_path = public_path('perfiles'.'/'.$nombreImagen);
            $image->save($imagen_path);
        }

        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $user->save();

        return redirect()->route('memes.index',$user->username);
    }
}
