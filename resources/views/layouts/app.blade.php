<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DevStagram - @yield('titulo')</title>
        {{-- Esta linea es para utilizar tailwindcss, se debe ejetutar el servidor de desarrollo de vite (npn run dev) --}}
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">

        <header class="p-5 border-b bg-white shadow">

            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">DevStagram</h1>

                {{-- Navegacion solo para usuarios autenticados --}}
                @auth
                    <nav>
                        <a class="font-bold capitalize text-gray-600 text-sm" href="#">Hola: <span class="font-normal"> {{auth()->user()->username}} </span></a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Cerrar Sesión</a>
                    </nav>
                @endauth

                {{-- Navegacion para usuarios no autenticados --}}
                @guest
                    <nav>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="#">Login</a>
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