<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with(['categoria', 'user'])->get();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('produtos.create', compact('categorias', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('produtos.edit', compact('produto', 'categorias', 'usuarios'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
    }
}
