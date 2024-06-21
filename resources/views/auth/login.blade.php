@extends('layouts.app')

@section('titulo')
Iniciar Sesion
@endsection

@section('contenido')
<div class="p-5">
    <form class="bg-white rounded-lg shadow-md p-5 lg:p-10 sm:w-full md:w-1/2 mx-auto" action="{{route('login')}}" method="POST">
        @csrf

        @if (session('error'))    
        <div class="bg-red-500 rounded-md p-2 mb-4">
            <p class="text-white text-center">{{ session('error') }}</p>
        </div>
        @endif
        <div class="mb-4">
            <label for="email" class="block font-bold">Email</label>
            <input value="{{old('email')}}" class="w-full border @error('email') border-red-500 @enderror rounded-lg p-2" id="email" name="email" type="email" placeholder="Ingresa tu email">
            @error('email')
                <div class="bg-red-500 p-2 rounded-md mt-1">
                    <p class="text-white text-center">{{ $message }}</p>
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-bold">Contraseña</label>
            <input class="w-full border @error('password') border-red-500 @enderror rounded-lg p-2" id="password" name="password" type="password" placeholder="Ingresa tu contraseña">
            @error('password')
                <div class="bg-red-500 p-2 rounded-md mt-1">
                    <p class="text-white text-center">{{ $message }}</p>
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <input class="border rounded-lg" id="remember" name="remember" type="checkbox" placeholder="Ingresa tu contraseña">
            <label for="remember">Mantener mi sesion abierta</label>
        </div>

        <input type="submit" value="Iniciar Sesion" class="mb-4 w-full bg-blue-600 hover:bg-blue-700 text-white cursor-pointer transition-colors p-2 rounded-lg">

        <div>
            <p>¿No tienes una cuenta? <a class="underline text-blue-600 hover:text-blue-700" href="{{route('register')}}">Crea Una</a></p>
        </div>
    </form>
</div>
@endsection