<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'usuario' => 'required',
            'senha' => 'required',
        ], [
            'usuario.required' => 'usuario obrigatorio',
            'senha.required' => 'senha obrigatoria',
        ]);

        if ($request->usuario === 'admin' && $request->senha === 'admin123') {
            session(['usuario_logado' => true, 'nome_usuario' => 'admin']);
            return redirect()->route('produtos.index');
        }

        return back()->withErrors(['erro' => 'usuario ou senha invalidos']);
    }

    public function logout(){
        session()->forget('usuario_logado');
        session()->forget('nome_usuario');
        return redirect()->route('login');
    }
}
