@extends('layouts.app')

@section('titulo')

    {{ $post->titulo }}
    
@endsection

@section('contenido')

    <div class="container mx-auto flex">

        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
            <div class="text-gray-500 text-sm mt-2">
                <p>0 Likes</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Publicado por: <span class="font-bold">{{ $user->username }}</span></p>
                <p class="text-gray-500 text-sm">Fecha de publicación: <span class="font-bold">{{ $post->created_at->diffForHumans() }}</span></p>
                <p class="text-gray-800 text-lg mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>
            
        </div>

        <div class="md:w-1/2">
            2
        </div>

    </div>

@endsection