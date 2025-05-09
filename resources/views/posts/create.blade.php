@extends('layouts.app')

@section('titulo' )
    Crea Una Nueva Publicación.
@endsection

{{-- Se utiliza el push para agregar estilos a la vista --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone/dist/min/dropzone.min.css">    
@endpush


@section('contenido')

    <div class="md:flex md:item-center">

        <div class="md:w-1/2 px-10">

            {{--Se utiliza el atributo enctype para poder enviar archivos a la base de datos --}}
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST">
                {{-- Para proporcionar seguridad al momento de realizar una consulta a la base de dato --}}
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Titulo de la Publicación" class="border p-3 w-full rounded-lg @error ('titulo') border-red-500 @enderror" value={{old('titulo')}}>

                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la Publicación" class="border p-3 w-full rounded-lg @error ('descripcion') border-red-500 @enderror">{{old('descripcion')}}</textarea>

                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}">

                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                        
                    @enderror
                </div>

                <input type="submit" name="crear_publicacion" id="crear_publicacion" value="Crear Publicacion" class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>

    </div>

@endsection