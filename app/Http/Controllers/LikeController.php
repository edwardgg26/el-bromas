<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Meme $meme, Request $request){
        $meme->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function destroy(Request $request, Meme $meme){
        $request->user()->likes()->where('meme_id', $meme->id)->delete();
        return back();
    }
}
