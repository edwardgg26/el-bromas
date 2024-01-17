@extends('layouts.app')

@section('titulo')
Meme de {{$user->username}}
@endsection

@section('contenido')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
    <x-meme :meme="$meme"/>

    <div class="bg-white rounded-lg shadow-md px-5  flex flex-col-reverse md:flex-col h-min">
        @if ($meme->comentarios->count())    
            <div class="overflow-auto max-h-80">
                @foreach ($meme->comentarios as $comentario)
                    <div class="border-t md:border-t-0 md:border-b py-5">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                            <a href="{{route('memes.index',$comentario->user)}}" class="flex gap-3 items-center">
                                <img class="rounded-full max-w-10" src="{{$comentario->user->imagen ? asset('perfiles/'.$comentario->user->imagen) : asset('img/usuario.svg')}} " alt="Imagen de Perfil de {{$comentario->user->username}}">
                                <p class="font-black mt-2">{{$comentario->user->username}}</p>
                            </a>
                            {{-- <a class="font-black" href="{{route('memes.index',$comentario->user)}}">{{$comentario->user->username}}</a> --}}
                            <p class="text-gray-600">{{$comentario->created_at->diffForHumans()}}</p>
                        </div>
                        <p class="break-all">{{$comentario->comentario}}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-5">
                <p class="text-center">No hay comentarios.</p>
            </div>
        @endif

        @auth
            <form action="{{route('comentarios.store',['meme'=>$meme,'user'=>$user])}}" method="POST" class="my-4">
                @csrf
                <div class="mb-1">
                    <label for="comentario" class="mb-1  block font-bold">Crear Comentario</label>
                    <textarea class="mb- w-full border @error('comentario') border-red-500 @enderror rounded-lg p-2" id="comentario" name="comentario" placeholder="Agrega un comentario...">{{old('comentario')}}</textarea>
                    @error('comentario')
                        <div class="bg-red-500 p-2 rounded-md">
                            <p class="text-white text-center">{{ $message }}</p>
                        </div>
                    @enderror

                    @if (session('mensaje'))
                        <div class="bg-green-600 p-2 rounded-md">
                            <p class="text-white text-center">{{ session('mensaje') }}</p>
                        </div>
                    @endif
                </div>

                <input type="submit" value="Agregar Comentario" class="mb-4 w-full md:w-auto md:mb-0 bg-blue-600 hover:bg-blue-700 text-white cursor-pointer transition-colors p-2 rounded-lg">
            </form>
        @endauth
    </div>
</div>
@endsection