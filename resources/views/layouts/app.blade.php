<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- El @stack es para agregar estilos a la vista que se esta utilizando, en este caso el de crear una publicacion --}}
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone/dist/min/dropzone.min.css"> --}}
        @stack('styles')
        <title>DevStagram - @yield('titulo')</title>
        {{-- Esta linea es para utilizar tailwindcss, se debe ejetutar el servidor de desarrollo de vite (npn run dev) --}}
        {{-- @vite('resources/css/app.css') --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>
    <body class="bg-gray-100">

        <header class="p-5 border-b bg-white shadow">

            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">DevStagram</h1>

                {{-- Navegacion solo para usuarios autenticados --}}
                @auth
                    <nav class="flex items-center space-x-4">

                        <a href="{{route('posts.create')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                            Crear
                        </a>                          
                        {{-- Se agrega ruta con el usuario autenticado para redireccionar al muro --}}
                        <a class="font-bold capitalize text-gray-600 text-sm" href="{{route('post.index', Auth::user()->username)}}">Hola: <span class="font-normal"> {{auth()->user()->username}} </span></a>
                        
                        <form action="{{route('logout')}}" method="POST">
                            {{-- Para proporcionar seguridad al momento de realizar una consulta a la base de dato --}}
                            @csrf 
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesión</button>
                        </form>
                        
                    </nav>
                @endauth

                {{-- Navegacion para usuarios no autenticados --}}
                @guest
                    <nav class="flex items-center space-x-4">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear Cuenta</a>
                    </nav>
                @endguest

                
            </div>

        </header>

        <main class="container mx-auto mt-10 ">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            
            @yield('contenido')

        </main>

        <footer class="mt-10 font-bold mx-auto text-center p-5 text-gray-500 uppercase">
            DevStagram | Todos los derechos reservados - {{now()->year}}
        </footer>

    </body>
</html>