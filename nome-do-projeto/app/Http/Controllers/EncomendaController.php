<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\EncomendaItem;
use App\Models\Produto;

class EncomendaController extends Controller
{
    // LISTA ENCOMENDAS E SUGESTÕES DE PRODUTOS
    public function index()
    {
        $encomendas = Encomenda::with('itens.produto')->get(); // pega todas encomendas com produtos
        $produtos = Produto::take(4)->get(); // produtos sugeridos

        return view('encomendas.index', compact('encomendas', 'produtos')); // envia pra view
    }

    // FORMULÁRIO PARA FINALIZAR PEDIDO
    public function create()
    {
        $produtos = Produto::take(4)->get(); // produtos sugeridos
        return view('encomendas.create', compact('produtos')); // mostra formulário
    }

    // SALVAR NOVA ENCOMENDA
    public function store(Request $request)
    {
        $request->validate([
            'nome_cliente' => 'required|min:3',
            'email_cliente' => 'required|email',
            'produtos' => 'required|array|min:1',
            'produtos.*.produto_id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
        ]); // valida dados

        $encomenda = Encomenda::create([
            'nome_cliente' => $request->nome_cliente,
            'email_cliente' => $request->email_cliente,
            'telefone_cliente' => $request->telefone_cliente,
            'observacoes' => $request->observacoes,
            'total' => 0,
        ]); // cria encomenda inicial

        $total = 0;

        foreach ($request->produtos as $item) {
            $produto = Produto::findOrFail($item['produto_id']); // pega produto
            $subtotal = $produto->preco * $item['quantidade']; // calcula subtotal

            $encomenda->itens()->create([
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $produto->preco,
                'subtotal' => $subtotal,
            ]); // cria item da encomenda

            $total += $subtotal; // soma total
        }

        $encomenda->update(['total' => $total]); // atualiza total da encomenda

        return redirect()->route('encomendas.index')->with('success', 'Encomenda cadastrada com sucesso!');
    }

    // FORMULÁRIO PARA EDITAR ENCOMENDA
    public function edit(Encomenda $encomenda)
    {
        $encomenda->load('itens.produto'); // carrega itens com produtos
        $produtos = Produto::all(); // pega todos produtos
        return view('encomendas.edit', compact('encomenda', 'produtos')); // mostra formulário
    }

    // ATUALIZAR ENCOMENDA
    public function update(Request $request, Encomenda $encomenda)
    {
        $request->validate([
            'nome_cliente' => 'required|min:3',
            'email_cliente' => 'required|email',
            'produtos' => 'required|array|min:1',
            'produtos.*.produto_id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
        ]); // valida dados

        $encomenda->update([
            'nome_cliente' => $request->nome_cliente,
            'email_cliente' => $request->email_cliente,
            'telefone_cliente' => $request->telefone_cliente,
            'observacoes' => $request->observacoes,
        ]); // atualiza dados da encomenda

        $encomenda->itens()->delete(); // remove itens antigos

        $total = 0;
        foreach ($request->produtos as $item) {
            $produto = Produto::findOrFail($item['produto_id']);
            $subtotal = $produto->preco * $item['quantidade'];

            $encomenda->itens()->create([
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $produto->preco,
                'subtotal' => $subtotal,
            ]); // recria itens

            $total += $subtotal;
        }

        $encomenda->update(['total' => $total]); // atualiza total

        return redirect()->route('encomendas.index')->with('success', 'Encomenda atualizada com sucesso!');
    }

    // EXCLUIR ENCOMENDA
    public function destroy(Encomenda $encomenda)
    {
        $encomenda->delete(); // remove do banco
        return redirect()->route('encomendas.index')->with('success', 'Encomenda excluída!');
    }
}
 