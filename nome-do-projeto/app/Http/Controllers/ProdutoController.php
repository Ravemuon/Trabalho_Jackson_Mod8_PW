<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->get(); // só categoria
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
    }
    public function home()
    {
        $categorias = Categoria::all(); // pega todas as categorias do banco
        $produtos = Produto::all();     // pega todos os produtos do banco

        return view('welcome', compact('categorias', 'produtos'));
    }

}
