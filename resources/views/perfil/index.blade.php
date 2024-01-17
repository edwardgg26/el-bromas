@extends('layouts.app')

@section('titulo')
Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
<form class="m-5 bg-white rounded-lg shadow-md p-5 lg:p-10 sm:w-full md:w-1/2 mx-auto" action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="username" class="block font-bold">Nombre de usuario</label>
        <input value="{{auth()->user()->username}}" class="w-full border @error('username') border-red-500 @enderror rounded-lg p-2" id="username" name="username" type="text" placeholder="Ingresa tu nombre de usuario">
        @error('username')
            <div class="bg-red-500 p-2 rounded-md mt-1">
                <p class="text-white text-center">{{ $message }}</p>
            </div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="imagen" class="block font-bold">Foto de perfil</label>
        <input class="w-full rounded-lg p-2" id="imagen" name="imagen" type="file" accept=".jpg, .jpeg, .png">
    </div>

    <input type="submit" value="Guardar Cambios" class="mb-4 w-full bg-blue-600 hover:bg-blue-700 text-white cursor-pointer transition-colors p-2 rounded-lg">
</form>

@endsection