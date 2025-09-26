@extends('layouts.app')

@section('title', 'Carrinho & Encomendas')

@section('content')
<div class="container py-4">

    {{-- 🛒 CARRINHO --}}
    <div class="card shadow-lg border-0 rounded-4 mb-5">
        <div class="card-header" style="background-color: #FFD700; color: #000; font-weight:bold; text-align:center; font-size:1.25rem;">
            🛒 Seu Carrinho
        </div>
        <div class="card-body bg-light text-black">
            @if(session('carrinho') && count(session('carrinho')) > 0)
                <div class="table-responsive mb-4">
                    <table class="table table-striped table-hover align-middle rounded-3 overflow-hidden">
                        <thead style="background-color: #FFD700; color: #000;">
                            <tr>
                                <th>📦 Produto</th>
                                <th>💲 Unitário</th>
                                <th>🔢 Qtd</th>
                                <th>💰 Subtotal</th>
                                <th class="text-center">⚙ Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(session('carrinho') as $id => $item)
                                @php $subtotal = $item['preco'] * $item['quantidade']; $total += $subtotal; @endphp
                                <tr style="color: #000;">
                                    <td>{{ $item['nome'] }}</td>
                                    <td>R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                                    <td>{{ $item['quantidade'] }}</td>
                                    <td>R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('carrinho.remover', $id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm rounded-pill">🗑 Remover</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr style="background-color: #FFD700; color: #000; font-weight:bold;">
                                <td colspan="3" class="text-end">TOTAL</td>
                                <td colspan="2">R$ {{ number_format($total, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-end">
                    <a href="{{ route('encomendas.create') }}" class="btn btn-success btn-lg rounded-pill shadow">
                        ✅ Finalizar Encomenda
                    </a>
                </div>
            @else
                <p class="text-center my-4" style="color: #000;">⚠ Seu carrinho está vazio.</p>
            @endif
        </div>
    </div>

    {{-- 🌿 SUGESTÕES DE PRODUTOS --}}
    <div class="mb-5">
        <h2 class="mb-4 text-center fw-bold border-bottom pb-2" style="color: #000;">🌿 Sugestões para você</h2>
        <div class="row g-4">
            @foreach($produtos->take(4) as $produto)
                <div class="col-md-3">
                    <div class="card card-umbanda h-100 shadow-lg border-0 rounded-4 overflow-hidden hover-shadow">
                        @if($produto->imagem)
                            <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}"
                                 style="height: 180px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column" style="color: #000;">
                            <h5 class="card-title fw-bold">{{ $produto->nome }}</h5>
                            <p class="fw-bold mb-1">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                            <p class="small">Estoque: {{ $produto->estoque }}</p>

                            <div class="mt-auto">
                                <form action="{{ route('carrinho.adicionar', $produto->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm w-100 rounded-pill"
                                            style="background-color: #FFD700; color: #000; font-weight:bold;">
                                        ➕ Adicionar ao Carrinho
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- 📜 HISTÓRICO DE ENCOMENDAS --}}
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header" style="background-color: #FFD700; color: #000; font-weight:bold; font-size:1.25rem;">
            📜 Suas Encomendas
        </div>
        <div class="card-body bg-light text-black">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle rounded-3 overflow-hidden shadow">
                    <thead style="background-color: #FFD700; color: #000;">
                        <tr>
                            <th>🙍 Cliente</th>
                            <th>📧 Email</th>
                            <th>🛒 Itens</th>
                            <th>💰 Total</th>
                            <th class="text-center">⚙ Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($encomendas as $encomenda)
                            <tr style="color: #000;">
                                <td>{{ $encomenda->nome_cliente }}</td>
                                <td>{{ $encomenda->email_cliente }}</td>
                                <td>
                                    <ul class="list-unstyled mb-0 small">
                                        @foreach($encomenda->itens as $item)
                                            <li>{{ $item->produto->nome }} (x{{ $item->quantidade }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>R$ {{ number_format($encomenda->total, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('encomendas.edit', $encomenda) }}"
                                       class="btn btn-warning btn-sm rounded-pill">✏ Editar</a>
                                    <form action="{{ route('encomendas.destroy', $encomenda) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm rounded-pill"
                                                onclick="return confirm('Tem certeza que deseja excluir?')">🗑 Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center" style="color: #000;">⚠ Nenhuma encomenda realizada.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
