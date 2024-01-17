<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MemeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show','index']);
    }
    public function index(User $user){

        $memes = Meme::where('user_id',$user->id)->paginate(20);

        return view('dashboard',[
            'user'=>$user,
            'memes'=>$memes
        ]);
    }

    public function create(){
        return view('memes.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'imagen' => 'required'
        ]);

        Meme::create([
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('memes.index', auth()->user()->username);
    }

    public function show(User $user, Meme $meme){
        return view('memes.show',[
            'meme'=>$meme,
            'user'=>$user
        ]);
    }

    public function destroy(Meme $meme){
        $this->authorize('delete', $meme);
        $meme->delete();
        $imagen_path = public_path('uploads/'.$meme->imagen);
        if(File::exists($imagen_path)){
            unlink($imagen_path);
        }

        return redirect()->route('memes.index',auth()->user()->username);
    }
}
