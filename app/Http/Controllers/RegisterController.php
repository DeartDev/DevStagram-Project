<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        //Validacion
        $request->validate([
            'name' => 'required | min:5',
            'username' => 'required | unique:users | min:3 | max:20',
            'email' => 'required | unique:users | email | max:60',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
    }
}
