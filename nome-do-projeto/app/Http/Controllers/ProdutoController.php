<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Encomenda;

class ProdutoController extends Controller
{
    // Página inicial (home)
    public function home()
    {
        $categorias = Categoria::all();
        $produtos = Produto::all();
        $encomendas = Encomenda::with('itens.produto')->get();
        $produtosRecentes = Produto::orderBy('created_at', 'desc')->take(6)->get();

        return view('welcome', compact('categorias', 'produtos', 'encomendas','produtosRecentes'));

    }

    // Listar todos os produtos
    public function index(Request $request)
    {
        $query = Produto::query();

        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%$search%")
                  ->orWhere('descricao', 'like', "%$search%");
            });
        }

        $produtos = $query->with('categoria')->get();
        $categorias = Categoria::all();

        return view('produtos.index', compact('produtos', 'categorias'));
    }

    // Mostrar detalhes de um produto
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    // Formulário para criar produto
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    // Salvar novo produto
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|url',
            'estoque' => 'nullable|numeric',
            'codigo' => 'nullable|string',
            'peso' => 'nullable|string',
            'dimensoes' => 'nullable|string',
            'tags' => 'nullable|string',
            'popular' => 'nullable|boolean',
            'ativo' => 'nullable|boolean',
            'observacoes' => 'nullable|string',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto criado!');
    }

    // Formulário para editar produto
    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    // Atualizar produto
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|url',
            'estoque' => 'nullable|numeric',
            'codigo' => 'nullable|string',
            'peso' => 'nullable|string',
            'dimensoes' => 'nullable|string',
            'tags' => 'nullable|string',
            'popular' => 'nullable|boolean',
            'ativo' => 'nullable|boolean',
            'observacoes' => 'nullable|string',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
    }

    // Excluir produto
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
    }
}
