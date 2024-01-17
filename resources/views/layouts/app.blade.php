<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ElBromas - @yield('titulo')</title>

        <!-- Styles -->
        
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @stack('styles')
        @livewireStyles
    </head>
    <body class="bg-gray-100" >
        
        <header class="bg-white shadow-sm sticky top-0">
            <div class="container px-5 mx-auto flex justify-between items-center flex-col md:flex-row">
                <h1 class="font-bold text-3xl md:text-4xl my-1 md:my-3"><a href="{{route('home')}}">ElBromas</a></h1>

                <nav class="flex gap-5 mb-1 md:mb-0">
                    @guest
                        <a class="hidden md:block font-black" href="{{route('login')}}">Iniciar Sesion</a>
                        <a class="hidden md:block font-black" href="{{route('register')}}">Crear Cuenta</a>
                    @endguest
                    @auth
                        <a class="hidden md:block font-black" href="{{route('home')}}">Inicio</a>
                        {{-- <a class="hidden md:block font-black" href="{{route('memes.index',auth()->user()->username)}}">Comunidad</a> --}}
                        {{-- <a class="hidden md:block font-black" href="{{route('memes.index',auth()->user()->username)}}">Categorias</a> --}}
                        <a class="hidden md:block font-black" href="{{route('memes.create')}}">Crear</a>
                        <p>Hola, <a class="font-black" href="{{route('memes.index',auth()->user()->username)}}">{{auth()->user()->username}}</a></p>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="container mx-auto p-5">
            <h2 class="font-bold text-2xl md:text-3xl mt-4 mb-2 text-center">@yield('titulo')</h2>
            @yield('contenido')
        </main>
        
        @auth
        <nav class="md:hidden bg-white border-t-2 px-6 py-3 sticky bottom-0 flex justify-between items-center gap-2">
            {{-- Boton Feed --}}
            <a href="{{route('memes.index',auth()->user()->username)}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>                                
            </a>

            {{-- Boton Crear meme --}}
            <a href="{{route('memes.create')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>                  
            </a>

            {{-- Boton Categorias --}}
            {{-- <a href="{{route('memes.index',auth()->user()->username)}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>                  
            </a> --}}

            {{-- Boton de perfil --}}
            <a href="{{route('memes.index',auth()->user()->username)}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>                  
            </a>
        </nav>
        @endauth

        {{-- <footer class="p-5">
            <p class="text-center text-gray-400">ElBromas - EGDev {{now()->year}}</p>
        </footer> --}}
        @livewireScripts
    </body>
</html>
