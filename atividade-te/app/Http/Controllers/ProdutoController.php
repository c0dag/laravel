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
            'imagem' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ], [
            'nome.required' => 'nome obrigatorio',
            'nome.min' => 'nome deve ter no minimo 3 caracteres',
            'preco.required' => 'preco obrigatorio',
            'preco.numeric' => 'preco deve ser um valor numerico',
            'preco.min' => 'preco deve ser maior ou igual a zero',
            'categoria_id.exists' => 'categoria invalida',
            'imagem.image' => 'arquivo deve ser uma imagem',
            'imagem.mimes' => 'imagem deve ser PNG ou JPG',
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $imagem->storeAs('public/produtos', $nomeImagem);
            $dados['imagem'] = $nomeImagem;
        }

        Produto::create($dados);
        return redirect()->route('produtos.create')->with('success', 'produto cadastrado com sucesso!');
    }

    public function edit($id){
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produtos.editar', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|min:3|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string|max:1000',
            'categoria_id' => 'nullable|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ], [
            'nome.required' => 'nome obrigatorio',
            'nome.min' => 'nome deve ter no minimo 3 caracteres',
            'preco.required' => 'preco obrigatorio',
            'preco.numeric' => 'preco deve ser um valor numerico',
            'preco.min' => 'preco deve ser maior ou igual a zero',
            'categoria_id.exists' => 'categoria invalida',
            'imagem.image' => 'arquivo deve ser uma imagem',
            'imagem.mimes' => 'imagem deve ser PNG ou JPG',
        ]);

        $produto = Produto::findOrFail($id);
        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            if ($produto->imagem && file_exists(storage_path('app/public/produtos/' . $produto->imagem))) {
                unlink(storage_path('app/public/produtos/' . $produto->imagem));
            }

            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $imagem->storeAs('public/produtos', $nomeImagem);
            $dados['imagem'] = $nomeImagem;
        }

        $produto->update($dados);
        return redirect()->route('produtos.index')->with('success', 'produto atualizado com sucesso!');
    }

    public function destroy($id){
        $produto = Produto::findOrFail($id);

        if ($produto->imagem && file_exists(storage_path('app/public/produtos/' . $produto->imagem))) {
            unlink(storage_path('app/public/produtos/' . $produto->imagem));
        }

        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'produto excluido com sucesso!');
    }
}
