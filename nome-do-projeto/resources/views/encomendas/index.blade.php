@extends('layouts.app')

@section('title', 'Produtos e Encomendas')

@section('content')
<div class="container">

    <h1 class="mb-4 text-light">Produtos Disponíveis</h1>

    <!-- Formulário de busca -->
    <form method="GET" action="{{ route('encomendas.index') }}" class="mb-4 row g-2">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar produto..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="categoria" class="form-select">
                <option value="">Todas as Categorias</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-purple w-100">Filtrar</button>
        </div>
    </form>

    <!-- Lista de produtos -->
    <div class="row">
        @forelse($produtos as $produto)
            <div class="col-md-4 mb-4">
                <div class="card card-dark h-100">
                    @if($produto->imagem)
                        <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text text-light mb-2">{{ Str::limit($produto->descricao, 60) }}</p>
                        <p class="text-light fw-bold mb-2">Preço: R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                        <p class="text-light mb-2">Estoque: {{ $produto->estoque }}</p>
                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('produtos.show', $produto) }}" class="btn btn-info btn-sm">Ver Produto</a>
                            <a href="{{ route('encomendas.create') }}?produto={{ $produto->id }}" class="btn btn-purple btn-sm">Encomendar</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-light">Nenhum produto encontrado.</p>
        @endforelse
    </div>

    <hr class="my-5 border-purple">

    <!-- Lista de encomendas já feitas -->
    <h2 class="mb-4 text-light">Encomendas Realizadas</h2>

    <a href="{{ route('encomendas.create') }}" class="btn btn-purple mb-3">Nova Encomenda</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Email</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($encomendas as $encomenda)
                <tr>
                    <td>{{ $encomenda->nome_cliente }}</td>
                    <td>{{ $encomenda->email_cliente }}</td>
                    <td>{{ $encomenda->produto->nome }}</td>
                    <td>{{ $encomenda->quantidade }}</td>
                    <td>
                        <a href="{{ route('encomendas.edit', $encomenda) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('encomendas.destroy', $encomenda) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Nenhuma encomenda realizada.</td></tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
 