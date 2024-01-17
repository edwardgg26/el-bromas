@extends('layouts.app')

@section('titulo')
@guest
    Perfil de {{$user->username}}
@endguest
@auth
    @if ($user->id === auth()->user()->id)
        Mi Perfil
    @else
        Perfil de {{$user->username}}
    @endif
@endauth
@endsection

@section('contenido')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 items-center">
    <div class="flex flex-col justify-center items-center">

        <img loading="lazy" class="w-full rounded-full max-w-80" src="{{$user->imagen ? asset('perfiles/'.$user->imagen) : asset('img/usuario.svg')}} " alt="Imagen de Perfil de {{$user->username}}">

        <div class="flex gap-1 items-center mt-3">
            <p class="font-black text-1xl text-lg"> {{$user->username}} </p>
    
            @auth
                @if($user->id === auth()->user()->id) 
                    <a href="{{route('perfil.index')}}"> 
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-600 hover:text-blue-700 transition-colors">
                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                        </svg>
                    </a>
                @endif
            @endauth
        </div>
    </div>
    
    <div>
        <h3 class="text-lg font-black text-center mb-3">Información del usuario</h3>

        <div>
            <div class="flex flex-col justify-center items-center mb-2">

                @auth
                    @if($user->id !== auth()->user()->id) 
                        @if ($user->isFollowing(auth()->user()))
                            <form action="{{route('users.unfollow',$user)}}" method="POST" class="text-center">
                                @csrf
                                @method('DELETE')
                                <button class="mb-4 w-full bg-red-600 hover:bg-red-700 text-white cursor-pointer transition-colors p-2 rounded-lg" type="submit" href="{{route('logout')}}">Dejar de Seguir</button>
                            </form>
                        @else
                            <form action="{{route('users.follow',$user)}}" method="POST" class="text-center">
                                @csrf
                                <button class="mb-4 w-full bg-blue-600 hover:bg-blue-700 text-white cursor-pointer transition-colors p-2 rounded-lg" type="submit" href="{{route('logout')}}">Seguir</button>
                            </form>
                        @endif
                    @endif
                @endauth

                <p>{{$user->followers->count()}} @choice('Seguidor|Seguidores',$user->followers->count())</p>
                <p>{{$user->followings->count()}} Siguiendo</p>
                <p>{{$memes->count()}} @choice('Meme|Memes',$memes->count())</p>
            </div>
            <p class="text-center">Registrado desde el {{$user->created_at->locale('es')->isoFormat('D \d\e MMMM \d\e\l Y')}}</p>

            @auth
                @if($user->id === auth()->user()->id) 
                    <form class="text-center" method="POST" action="{{route('logout')}}">
                        @csrf
                        <button class="text-red-500 hover:text-red-600" type="submit" href="{{route('logout')}}">Cerrar Sesión</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</div>

<div>
    <h3 class="text-2xl font-black text-center my-3">Memes publicados</h3>
    <x-listar-meme :memes="$memes" :perfilUsuario="true"/>
</div>
@endsection