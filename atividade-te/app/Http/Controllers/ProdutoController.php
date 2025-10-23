<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('produtos.index').compact('produtos');
    }

    public function criar(){
        return view('produtos.criar');
    }

    public function salvar(Request $request){
        $request->validate([
            'nome' => 'required|string|min:3|max:255',
            'preco' => 'required|numeric',
        ]);

        Produto::create($request->all());
        return redirect()->route('produtos.index');
    }
}
