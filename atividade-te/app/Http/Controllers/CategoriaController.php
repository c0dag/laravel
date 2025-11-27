<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(Request $request){
        $categorias = Categoria::all();
        $ultimaCategoria = $request->cookie('ultima_categoria');
        return view('categorias.index', compact('categorias', 'ultimaCategoria'));
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

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view('categorias.editar', compact('categoria'))->cookie('ultima_categoria', $categoria->nome, 60 * 24 * 7);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|min:3|max:255',
        ], [
            'nome.required' => 'nome obrigatorio',
            'nome.min' => 'nome deve ter no minimo 3 caracteres',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'categoria atualizada com sucesso!')->cookie('ultima_categoria', $categoria->nome, 60 * 24 * 7);
    }

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'categoria excluida com sucesso!');
    }
}
