<?php

namespace App\Http\Controllers;

use App\Models\Meme;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function __invoke(){

        $ids = auth()->user()->followings->pluck('id')->toArray();
        $memes = Meme::whereIn('user_id',$ids)->latest()->paginate(20);
        return view('home', [
            'memes' => $memes
        ]);
    }
}
