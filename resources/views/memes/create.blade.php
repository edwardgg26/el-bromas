@extends('layouts.app')

@section('titulo')
Crear Meme
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
<div class="p-5">
    <div class="bg-white rounded-lg shadow-md p-5 lg:p-10 sm:w-full md:w-1/2 mx-auto">

        @if (session('error'))    
            <div class="bg-red-500 rounded-md p-2 mb-4">
                <p class="text-white text-center">{{ session('error') }}</p>
            </div>
        @endif

        @error('imagen')
            <div class="bg-red-500 rounded-md p-2 mb-4">
                <p class="text-white text-center">{{ $message }}</p>
            </div>
        @enderror 

        <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" class="dropzone mb-4 flex justify-center items-center rounded-lg border border-dashed" id="dropzone">
            @csrf
        </form>

        <form method="POST" action="{{route('memes.store')}}">
            @csrf

            <input name="imagen" type="hidden" value="{{old('imagen')}}" >
            <input type="submit" value="Crear Meme" class="w-full bg-blue-600 hover:bg-blue-700 text-white cursor-pointer transition-colors p-2 rounded-lg">
        </form>
    
 
    </div>
</div>
@endsection