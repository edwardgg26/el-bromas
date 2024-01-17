<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        
        if(auth()->check()){
            return redirect()->route('memes.index', auth()->user());
        }

        return view('auth.login');
    }

    public function store(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('error','Credenciales incorrectas');
        }

        return redirect()->route('memes.index',auth()->user()->username);
    }
}
