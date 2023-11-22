<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){

        $credenciais = $request->validade([
            'email' => ['required', 'email'],
            'password' => ['required'], 
            ]
        );

        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->with('erro', 'Email ou senha inválida.');
        }

    }
}