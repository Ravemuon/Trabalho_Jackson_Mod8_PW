<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\EncomendaItem;
use App\Models\Produto;

class EncomendaController extends Controller
{
    // Lista encomendas e sugestões de produtos
    public function index()
    {
        $encomendas = Encomenda::with('itens.produto')->get();
        $produtos = Produto::take(4)->get(); // produtos sugeridos

        return view('encomendas.index', compact('encomendas', 'produtos'));
    }

    // Formulário para finalizar pedido
    public function create()
    {
        $produtos = Produto::take(4)->get(); // produtos sugeridos
        return view('encomendas.create', compact('produtos'));
    }

    // Salvar nova encomenda
    public function store(Request $request)
    {
        $request->validate([
            'nome_cliente' => 'required|min:3',
            'email_cliente' => 'required|email',
            'produtos' => 'required|array|min:1',
            'produtos.*.produto_id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
        ]);

        $encomenda = Encomenda::create([
            'nome_cliente' => $request->nome_cliente,
            'email_cliente' => $request->email_cliente,
            'telefone_cliente' => $request->telefone_cliente,
            'observacoes' => $request->observacoes,
            'total' => 0,
        ]);

        $total = 0;

        foreach ($request->produtos as $item) {
            $produto = Produto::findOrFail($item['produto_id']);
            $subtotal = $produto->preco * $item['quantidade'];

            $encomenda->itens()->create([
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $produto->preco,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $encomenda->update(['total' => $total]);

        return redirect()->route('encomendas.index')->with('success', 'Encomenda cadastrada com sucesso!');
    }

    // Formulário para editar encomenda
    public function edit(Encomenda $encomenda)
    {
        $encomenda->load('itens.produto');
        $produtos = Produto::all();
        return view('encomendas.edit', compact('encomenda', 'produtos'));
    }

    // Atualizar encomenda
    public function update(Request $request, Encomenda $encomenda)
    {
        $request->validate([
            'nome_cliente' => 'required|min:3',
            'email_cliente' => 'required|email',
            'produtos' => 'required|array|min:1',
            'produtos.*.produto_id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
        ]);

        $encomenda->update([
            'nome_cliente' => $request->nome_cliente,
            'email_cliente' => $request->email_cliente,
            'telefone_cliente' => $request->telefone_cliente,
            'observacoes' => $request->observacoes,
        ]);

        // Remove itens antigos
        $encomenda->itens()->delete();

        $total = 0;
        foreach ($request->produtos as $item) {
            $produto = Produto::findOrFail($item['produto_id']);
            $subtotal = $produto->preco * $item['quantidade'];

            $encomenda->itens()->create([
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $produto->preco,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $encomenda->update(['total' => $total]);

        return redirect()->route('encomendas.index')->with('success', 'Encomenda atualizada com sucesso!');
    }

    // Excluir encomenda
    public function destroy(Encomenda $encomenda)
    {
        $encomenda->delete();
        return redirect()->route('encomendas.index')->with('success', 'Encomenda excluída!');
    }
}
