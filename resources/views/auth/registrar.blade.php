@extends('layouts.app')

@section('titulo')
Registrate en ElBromas
@endsection

@section('contenido')
<div class="p-5">
    <form class="bg-white rounded-lg shadow-md p-5 lg:p-10 sm:w-full md:w-1/2 mx-auto" action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-bold">Nombre</label>
            <input value="{{old('name')}}" class="w-full border @error('name') border-red-500 @enderror rounded-lg p-2" id="name" name="name" type="text" placeholder="Ingresa tu nombre">
            @error('name')
                <div class="bg-red-500 p-2 rounded-md mt-1">
                    <p class="text-white text-center">{{ $message }}</p>
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="username" class="block font-bold">Nombre de usuario</label>
            <input value="{{old('username')}}" class="w-full border @error('username') border-red-500 @enderror rounded-lg p-2" id="username" name="username" type="text" placeholder="Ingresa tu nombre de usuario">
            @error('username')
                <div class="bg-red-500 p-2 rounded-md mt-1">
                    <p class="text-white text-center">{{ $message }}</p>
                </div>
            @enderror
        </div>

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
            <label for="password_confirmation" class="block font-bold">Confirmar Contraseña</label>
            <input class="w-full border rounded-lg p-2" id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite tu contraseña">
        </div>

        <input type="submit" value="Crear Cuenta" class="mb-4 w-full bg-blue-600 hover:bg-blue-700 text-white cursor-pointer transition-colors p-2 rounded-lg">
        
        <div>
            <p>¿Ya tienes una cuenta? <a class="underline text-blue-600 hover:text-blue-700" href="{{route('login')}}">Inicia Sesion</a></p>
        </div>
    </form>
</div>
@endsection