@extends('layouts.app')

@section('titulo')
Inicio
@endsection

@section('contenido')
<x-listar-meme :memes="$memes"/>
@endsection