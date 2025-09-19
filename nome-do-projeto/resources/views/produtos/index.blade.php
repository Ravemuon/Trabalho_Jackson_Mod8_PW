@extends('layouts.app')

@section('title','Produtos')

@section('content')
<div class="container py-4">
    <h1 class="text-light mb-4">Produtos</h1>

    <!-- Formulário de filtro/pesquisa -->
    <form method="GET" action="{{ route('produtos.index') }}" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="categoria" class="form-control">
                <option value="">Todas as categorias</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Filtrar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Limpar</a>
        </div>
    </form>

    <div class="row">
        @foreach($produtos as $produto)
            <div class="col-md-4 mb-4">
                <div class="card bg-dark text-light h-100">
                    @if($produto->imagem)
                        <img src="{{ $produto->imagem }}" class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $produto->nome }}">
                    @endif
                    <div class="card-body">
                        <h5>{{ $produto->nome }}</h5>
                        <p>{{ $produto->descricao }}</p>
                        <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                        <p><strong>Categoria:</strong> {{ $produto->categoria->nome ?? '' }}</p>

                        <!-- CRUD visível para todos -->
                        <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $produtos->links('pagination::bootstrap-5') }}
    <a href="{{ route('produtos.create') }}" class="btn btn-success mt-4">Criar Novo Produto</a>
</div>
@endsection
