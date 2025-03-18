@extends('layouts.app')

@section('titulo' )
    Crea Una Nueva Publicación.
@endsection


@section('contenido')

    <div class="md:flex md:item-center">

        <div class="md:w-1/2 px-10">
            Imagen aqui
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST">
                {{-- Para proporcionar seguridad al momento de realizar una consulta a la base de dato --}}
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg @error ('name') border-red-500 @enderror" value={{old('name')}}>

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
            </form>
        </div>

    </div>

@endsection