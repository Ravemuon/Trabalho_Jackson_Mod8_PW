@extends('layouts.app')

@section('title', $produto->nome)

@section('content')
<div class="container my-4">
    <h1 class="text-umbanda mb-4 text-center">{{ $produto->nome }}</h1>

    <div class="mb-4 d-flex justify-content-center gap-2 flex-wrap">
        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm text-white" style="background-color: #28a745;">Editar</a>
        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir {{ $produto->nome }}?')" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
        </form>
        <form action="{{ route('carrinho.adicionar', $produto->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm text-dark" style="background-color: #FFD700; font-weight:bold;">
                ➕ Carrinho
            </button>
        </form>
        <a href="{{ route('produtos.index') }}" class="btn btn-outline-umbanda">← Voltar</a>
    </div>

    <div class="row g-4">
        <div class="col-md-6 text-center">
            <img src="{{ $produto->imagem ?? 'https://via.placeholder.com/400x300.png?text='.$produto->nome }}"
                 class="img-fluid rounded shadow" alt="{{ $produto->nome }}">
        </div>
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</li>
                <li class="list-group-item"><strong>Categoria:</strong> {{ $produto->categoria->nome ?? 'Sem categoria' }}</li>
                <li class="list-group-item"><strong>Estoque:</strong> {{ $produto->estoque }}</li>
                <li class="list-group-item"><strong>Código:</strong> {{ $produto->codigo ?? '-' }}</li>
                <li class="list-group-item"><strong>Peso:</strong> {{ $produto->peso ?? '-' }} kg</li>
                <li class="list-group-item"><strong>Dimensões:</strong> {{ $produto->dimensoes ?? '-' }}</li>
                <li class="list-group-item"><strong>Tags:</strong> {{ $produto->tags ?? '-' }}</li>
                <li class="list-group-item"><strong>Popular:</strong> {{ $produto->popular ? 'Sim' : 'Não' }}</li>
                <li class="list-group-item"><strong>Ativo:</strong> {{ $produto->ativo ? 'Sim' : 'Não' }}</li>
                @if($produto->observacoes)
                    <li class="list-group-item"><strong>Observações:</strong> {{ $produto->observacoes }}</li>
                @endif
                <li class="list-group-item"><strong>Descrição:</strong><br>{{ $produto->descricao }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
