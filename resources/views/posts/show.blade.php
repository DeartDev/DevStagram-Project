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

        <div class="md:w-1/2 p-5">
            <div claass="shadow bg-white p-5 mb-5">
                <p class="text-xl font-bold text-center mb-4">Agrega un comentario</p>

                <form action="">
                        <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Comentario</label>
                        <textarea id="comentario" name="comentario" placeholder="Deja un comentario" class="border p-3 w-full rounded-lg @error ('comentario') border-red-500 @enderror"></textarea>

                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>

                    <input type="submit" name="comentar" id="comentar" value="comentar" class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

                </form>
            </div>
        </div>

    </div>

@endsection