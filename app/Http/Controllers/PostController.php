<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Redireccion al muro
    public function index()
    {
        return view('dashboard');

    }
}
