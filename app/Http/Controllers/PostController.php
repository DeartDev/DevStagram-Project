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
        // dd($user->username);
        return view('dashboard', ['user'=>$user]);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required|string',
        ]);

        $request->user()->posts()->create($request->only('content'));


        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('post.index', Auth::user()->username);
    }
}
