<?php

namespace App\Http\Controllers;

use App\Models\Encomenda;
use App\Models\Produto;
use Illuminate\Http\Request;

class EncomendaController extends Controller
{
    public function index()
    {
        $encomendas = Encomenda::with('produto')->get();
        return view('encomendas.index', compact('encomendas'));
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('encomendas.create', compact('produtos'));
    }

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

    public function edit(Encomenda $encomenda)
    {
        $produtos = Produto::all();
        return view('encomendas.edit', compact('encomenda', 'produtos'));
    }

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

    public function destroy(Encomenda $encomenda)
    {
        $encomenda->delete();
        return redirect()->route('encomendas.index')->with('success', 'Encomenda excluída!');
    }
}
