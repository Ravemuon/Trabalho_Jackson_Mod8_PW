<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // LISTAGEM PÚBLICA DE ENTIDADES
    public function publicIndex()
    {
        $linhas = Categoria::where('linha', 'linha')->get();
        $orixas = Categoria::where('linha', 'orixa')->get();

        return view('categorias.public', compact('linhas', 'orixas'));
    }

    // MOSTRAR DETALHES DE UMA CATEGORIA
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    // CRUD COMPLETO (pode ser acessado por todos por enquanto)
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:2',
            'descricao' => 'nullable',
            'imagem' => 'nullable|url',
            'linha' => 'nullable',
            'cores' => 'nullable',
            'dia_semana' => 'nullable',
            'historia' => 'nullable',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria criada!');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|min:2',
            'descricao' => 'nullable',
            'imagem' => 'nullable|url',
            'linha' => 'nullable',
            'cores' => 'nullable',
            'dia_semana' => 'nullable',
            'historia' => 'nullable',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída!');
    }
}
