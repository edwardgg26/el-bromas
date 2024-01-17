<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        if(auth()->check()){
            return redirect()->route('memes.index', auth()->user());
        }

        return view('auth.registrar');
    }

    public function store(Request $request) {
        
        $request->request->add([
            'username'=> Str::slug($request->username)
        ]);

        $this->validate($request,[
            'name'=> 'required|max:30',
            'username' => 'required|min:3|max:20|unique:users',
            'email' => 'required|email|max:60|unique:users',
            'password' => 'required|min:8|max:16|regex:/^\S*$/|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' =>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('memes.index');
    }
}
