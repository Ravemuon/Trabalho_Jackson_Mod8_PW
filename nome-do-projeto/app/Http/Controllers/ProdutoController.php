<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
        // Página inicial (home)
    public function home()
    {
        // Pega todas categorias e produtos para mostrar na home
        $categorias = Categoria::all();
        $produtos = Produto::all();

        return view('welcome', compact('categorias', 'produtos'));

        $query = Produto::query();

        // Filtrar por categoria (quando clicado "Ver Produtos" em categoria)
        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('categoria_id', $request->categoria);
        }
    }
    // LISTAR TODOS OS PRODUTOS (CRUD completo)
    public function index(Request $request)
    {
        $query = Produto::query();

        // Filtrar por categoria
        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('categoria_id', $request->categoria);
        }

        // Filtrar por pesquisa
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nome', 'like', "%$search%")
                  ->orWhere('descricao', 'like', "%$search%");
            });
        }

        $produtos = $query->with('categoria')->get(); // ou paginate(12) se quiser paginação
        $categorias = Categoria::all();

        return view('produtos.index', compact('produtos', 'categorias'));
    }

    // MOSTRAR DETALHES DE UM PRODUTO
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    // FORMULÁRIO PARA CRIAR PRODUTO
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    // SALVAR PRODUTO NOVO
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

    // FORMULÁRIO PARA EDITAR PRODUTO
    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    // ATUALIZAR PRODUTO
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

    // EXCLUIR PRODUTO
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
    }
}
