<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //debuguea el codigo para verificar los campos del formulario
        //dd($request);

        //($request->get('name'));

        // Modificar el Request
        $request->merge(['username' => Str::slug($request->name)]);


        //Validacion
        $request->validate([
            'name' => 'required | min:5',
            'username' => 'required | unique:users| min:3 | max:20',
            'email' => 'required | unique:users| email | max:60',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
        ]);

        //Redireccionar
        return redirect()->route('post.index');
    }
}
