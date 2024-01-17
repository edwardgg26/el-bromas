<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(User $user, Meme $meme, Request $request){

        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);

        Comentario::create([
            'user_id' => auth()->user()->id,
            'meme_id' => $meme->id,
            'comentario' => $request->comentario
        ]);

        return back()->with('mensaje', 'Comentario realizado con exito');
    }
}
