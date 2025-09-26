@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')
<div class="container">

    <!-- Título principal -->
    <h1 class="mb-4 text-center fw-bold" style="color: #000;">🛒 Editar Pedido</h1>

    @php
        // Carrega os itens da encomenda diretamente do banco
        $carrinho = $encomenda->itens->mapWithKeys(function($item) {
            return [$item->produto_id => [
                'nome' => $item->produto->nome,
                'preco' => $item->produto->preco,
                'quantidade' => $item->quantidade
            ]];
        })->toArray();
    @endphp

    @if(count($carrinho) > 0)
        <form action="{{ route('encomendas.update', $encomenda->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tabela com itens do pedido -->
            <div class="table-responsive mb-4">
                <table class="table table-light table-hover align-middle shadow rounded-3 overflow-hidden">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th>📦 Produto</th>
                            <th>💲 Preço Unitário</th>
                            <th>🔢 Quantidade</th>
                            <th>💰 Subtotal</th>
                            <th class="text-center">⚙ Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($carrinho as $id => $item)
                            @php
                                $subtotal = $item['preco'] * $item['quantidade'];
                                $total += $subtotal;
                            @endphp
                            <tr style="color: #000;">
                                <td>{{ $item['nome'] }}</td>
                                <td>R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                                <td>
                                    <input type="number" name="produtos[{{ $id }}][quantidade]" value="{{ $item['quantidade'] }}" min="1" class="form-control" style="width: 80px;">
                                    <input type="hidden" name="produtos[{{ $id }}][produto_id]" value="{{ $id }}">
                                </td>
                                <td>R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <!-- Botão para remover item -->
                                    <form action="{{ route('encomendas.removerItem', [$encomenda->id, $id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill"
                                                onclick="return confirm('Tem certeza que deseja remover este item?')">
                                            🗑 Remover
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="fw-bold bg-secondary text-light">
                            <td colspan="3" class="text-end">TOTAL</td>
                            <td>R$ {{ number_format($total, 2, ',', '.') }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Informações do cliente -->
            <h2 class="fw-bold mb-3" style="color: #000;">Informações do Cliente</h2>

            <div class="mb-3">
                <label style="color: #000;">Nome do Cliente</label>
                <input type="text" name="nome_cliente" class="form-control" value="{{ old('nome_cliente', $encomenda->nome_cliente) }}" required>
            </div>

            <div class="mb-3">
                <label style="color: #000;">Email do Cliente</label>
                <input type="email" name="email_cliente" class="form-control" value="{{ old('email_cliente', $encomenda->email_cliente) }}" required>
            </div>

            <div class="mb-3">
                <label style="color: #000;">Telefone</label>
                <input type="text" name="telefone_cliente" class="form-control" value="{{ old('telefone_cliente', $encomenda->telefone_cliente) }}">
            </div>

            <div class="mb-3">
                <label style="color: #000;">Observações</label>
                <textarea name="observacoes" class="form-control">{{ old('observacoes', $encomenda->observacoes) }}</textarea>
            </div>

            <input type="hidden" name="total" value="{{ $total }}">

            <div class="d-flex gap-3 flex-column flex-md-row">
                <!-- Botão Atualizar Pedido -->
                <button type="submit" class="btn btn-warning w-100 btn-lg">✏️ Atualizar Pedido</button>

                <!-- Botão Cancelar Pedido -->
                <form action="{{ route('encomendas.destroy', $encomenda->id) }}" method="POST" class="w-100">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100 btn-lg"
                            onclick="return confirm('Tem certeza que deseja cancelar este pedido?')">
                        ❌ Cancelar Pedido
                    </button>
                </form>
            </div>
        </form>

    @else
        <p class="text-center fw-bold" style="color: #000;">⚠ Nenhum item encontrado no pedido.</p>
        <a href="{{ route('produtos.index') }}" class="btn btn-primary w-100 btn-lg mt-3"> Voltar às Compras</a>
    @endif

</div>
@endsection
