<?php

namespace App\Http\Controllers;

use App\Models\Encomenda;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class EncomendaController extends Controller
{
    // Lista encomendas e produtos disponíveis
    public function index(Request $request)
    {
        // Produtos com filtro de categoria ou pesquisa
        $query = Produto::query();

        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('categoria_id', $request->categoria);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nome', 'like', "%$search%")
                  ->orWhere('descricao', 'like', "%$search%");
            });
        }

        $produtos = $query->get(); // ou paginate(x) para paginação

        // Todas as categorias para filtros
        $categorias = Categoria::all();

        // Todas as encomendas
        $encomendas = Encomenda::with('produto')->get();

        return view('encomendas.index', compact('encomendas', 'produtos', 'categorias'));
    }

    // Formulário de nova encomenda
    public function create()
    {
        $produtos = Produto::all();
        return view('encomendas.create', compact('produtos'));
    }

    // Armazenar nova encomenda
    public function store(Request $request)
    {
        $request->validate([
            'nome_cliente' => 'required|min:3',
            'email_cliente' => 'required|email',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        Encomenda::create($request->all());

        return redirect()->route('encomendas.index')->with('success', 'Encomenda cadastrada com sucesso!');
    }

    // Editar encomenda
    public function edit(Encomenda $encomenda)
    {
        $produtos = Produto::all();
        return view('encomendas.edit', compact('encomenda', 'produtos'));
    }

    // Atualizar encomenda
    public function update(Request $request, Encomenda $encomenda)
    {
        $request->validate([
            'nome_cliente' => 'required|min:3',
            'email_cliente' => 'required|email',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $encomenda->update($request->all());

        return redirect()->route('encomendas.index')->with('success', 'Encomenda atualizada com sucesso!');
    }

    // Excluir encomenda
    public function destroy(Encomenda $encomenda)
    {
        $encomenda->delete();
        return redirect()->route('encomendas.index')->with('success', 'Encomenda excluída!');
    }
}
