<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create(){
        $categorias = Categoria::all();
        return view('produtos.criar', compact('categorias'));
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string|min:3|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string|max:1000',
            'categoria_id' => 'nullable|exists:categorias,id',
        ], [
            'nome.required' => 'nome obrigatorio',
            'nome.min' => 'nome deve ter no minimo 3 caracteres',
            'preco.required' => 'preco obrigatorio',
            'preco.numeric' => 'preco deve ser um valor numerico',
            'preco.min' => 'preco deve ser maior ou igual a zero',
            'categoria_id.exists' => 'categoria invalida',
        ]);

        Produto::create($request->all());
        return redirect()->route('produtos.create')->with('success', 'produto cadastrado com sucesso!');
    }
}
