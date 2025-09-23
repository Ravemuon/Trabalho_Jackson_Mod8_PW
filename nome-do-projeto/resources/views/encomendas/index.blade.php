@extends('layouts.app')

@section('title', 'Produtos e Encomendas')

@section('content')
<div class="container py-4">

    <h1 class="mb-5 text-center fw-bold text-umbanda">🌿 Produtos Disponíveis</h1>

    <!-- Formulário de busca -->
    <form method="GET" action="{{ route('encomendas.index') }}" class="mb-5 row g-3 justify-content-center">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control rounded-pill shadow-sm"
                   placeholder="🔍 Pesquisar produto..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="categoria" class="form-select rounded-pill shadow-sm">
                <option value="">📂 Todas as Categorias</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-purple w-100 rounded-pill shadow-sm">Filtrar</button>
        </div>
    </form>

    <!-- Lista de produtos -->
    <div class="row g-4">
        @forelse($produtos as $produto)
            <div class="col-md-4 col-lg-3">
                <div class="card card-umbanda h-100 shadow-lg border-0 rounded-4 overflow-hidden hover-shadow">
                    @if($produto->imagem)
                        <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}"
                             style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-umbanda fw-bold">{{ $produto->nome }}</h5>
                        <p class="card-text text-light small">{{ Str::limit($produto->descricao, 60) }}</p>
                        <p class="fw-bold text-purple mb-1"> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                        <p class="text-light small mb-3"> Estoque: {{ $produto->estoque }}</p>

                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('produtos.show', $produto) }}" class="btn btn-outline-light btn-sm rounded-pill">
                                Ver Produto
                            </a>
                            <a href="{{ route('encomendas.create') }}?produto={{ $produto->id }}"
                               class="btn btn-purple btn-sm rounded-pill">
                               Encomendar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-light">⚠ Nenhum produto encontrado.</p>
        @endforelse
    </div>

    <hr class="my-5 border-purple">

    <!-- Lista de encomendas já feitas -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-umbanda fw-bold">📜 Encomendas Realizadas</h2>
        <a href="{{ route('encomendas.create') }}" class="btn btn-purple shadow rounded-pill">
            + Nova Encomenda
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-dark table-hover align-middle rounded-3 overflow-hidden shadow">
            <thead class="bg-purple text-light">
                <tr>
                    <th>🙍 Cliente</th>
                    <th>📧 Email</th>
                    <th>🛒 Produto</th>
                    <th>🔢 Quantidade</th>
                    <th class="text-center">⚙ Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($encomendas as $encomenda)
                    <tr>
                        <td>{{ $encomenda->nome_cliente }}</td>
                        <td>{{ $encomenda->email_cliente }}</td>
                        <td>{{ $encomenda->produto->nome }}</td>
                        <td>{{ $encomenda->quantidade }}</td>
                        <td class="text-center">
                            <a href="{{ route('encomendas.edit', $encomenda) }}"
                               class="btn btn-warning btn-sm rounded-pill">✏ Editar</a>
                            <form action="{{ route('encomendas.destroy', $encomenda) }}"
                                  method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm rounded-pill"
                                        onclick="return confirm('Tem certeza que deseja excluir?')">🗑 Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">⚠ Nenhuma encomenda realizada.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
