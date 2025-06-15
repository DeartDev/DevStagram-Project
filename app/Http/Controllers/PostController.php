<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Configuration\Middleware;

class PostController extends Controller
{
    // Redireccion al muro
    public function index(User $user)
    {

        // Instancia del usuario autenticado
        $posts = Post::where('user_id',$user->id)->paginate(4);

        return view('dashboard', [
            'user'=>$user,
            'posts' => $posts,
        ]);

    }

    public function create()
    {
        return view('posts.create');
    }

    /* public function store(Request $request)
    {

        // dd($request->all());
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required|string',
        ]);

        // Crear el post asociado al usuario autenticado
        $request->user()->posts()->create($request->only('content'));


        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('post.index', Auth::user()->username);
    } */

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required|string',
        ]);

        // Crear el post asociado al usuario autenticado
        /* $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen
        ]); */

        //Otra forma de crear el post
        /* $post = new Post();
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = Auth::id();
        $post->save(); */

        //Una forma mas para crear el post
        $request->user()->posts()->create([
            'titulo' => $validatedData['titulo'],
            'descripcion' => $validatedData['descripcion'],
            'imagen' => $validatedData['imagen'],
            'user_id' => Auth::id(), // No es necesario, ya que se usa el método de relación
        ]);

        return redirect()->route('post.index', Auth::user()->username);
    }
}
