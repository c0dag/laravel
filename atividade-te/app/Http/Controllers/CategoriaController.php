<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create(){
        return view('categorias.criar');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string|min:3|max:255',
        ], [
            'nome.required' => 'nome obrigatorio',
            'nome.min' => 'nome deve ter no minimo 3 caracteres',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.create')->with('success', 'categoria cadastrada com sucesso!');
    }
}
