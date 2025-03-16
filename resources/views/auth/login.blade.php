@extends('layouts.app')

@section('titulo')
    Inicia Sesión en DevStagram 
@endsection

@section('contenido')

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 pd-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuario" class="rounded-4xl">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}">
                {{-- Para proporcionar seguridad al momento de realizar una consulta a la base de dato --}}
                @csrf

                @if (session('mensaje'))

                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{session('mensaje')}}
                    </p>
                    
                @endif()

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" name="email" type="text" placeholder="Tu Email de Registro" class="border p-3 w-full rounded-lg @error ('email') border-red-500 @enderror" value={{old('email')}}>

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password de Registro</label>
                    <input id="password" name="password" type="password" placeholder="Ingresa tu Password" class="border p-3 w-full rounded-lg @error ('name') border-red-500 @enderror">

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>


                <input type="submit" name="iniciar_sesion" id="iniciar_sesion" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>
        </div>
    </div>

@endsection