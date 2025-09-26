@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="container">
    <h1 class="mb-4 text-umbanda text-center">Gerenciar Produtos</h1>

    {{-- Botões: Novo Produto + Pesquisar + Filtro --}}
    <div class="d-flex justify-content-center mb-4 gap-3 flex-wrap">
        <a href="{{ route('produtos.create') }}" class="btn btn-umbanda btn-lg shadow">+ Novo Produto</a>

        <form action="{{ route('produtos.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar produto..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-umbanda ms-2">Pesquisar</button>
        </form>

        <form action="{{ route('produtos.index') }}" method="GET" class="d-flex">
            <select name="categoria" class="form-select">
                <option value="">Filtrar por Categoria</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" @if(request('categoria') == $cat->id) selected @endif>
                        {{ $cat->nome }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-umbanda ms-2">Filtrar</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

<!-- Produtos por Categoria -->
@foreach($categorias as $categoria)
    @php
        $produtosCategoria = $produtos->where('categoria_id', $categoria->id);
    @endphp

    @if($produtosCategoria->count() > 0)
        <section class="mb-5">
            <h2 class="text-umbanda mb-4 section-title">{{ $categoria->nome }}</h2>
            <div id="carouselCategoria{{ $categoria->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($produtosCategoria->chunk(4) as $chunkIndex => $chunk)
                        <div class="carousel-item @if($chunkIndex==0) active @endif">
                            <div class="row justify-content-center">
                                @foreach($chunk as $produto)
                                    <div class="col-6 col-md-3 mb-3">
                                        <div class="card card-umbanda text-center h-100">
                                            <img src="{{ $produto->imagem ?? 'https://via.placeholder.com/300x200.png?text='.$produto->nome }}"
                                                 class="card-img-top" alt="{{ $produto->nome }}" style="height: 160px; object-fit: cover;">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title text-umbanda">{{ $produto->nome }}</h5>
                                                <p class="card-text fw-bold text-umbanda" style="color:#6b3fa0;">
                                                    R$ {{ number_format($produto->preco,2,",",".") }}
                                                </p>
                                                <a href="{{ route('produtos.show', $produto) }}" class="btn btn-umbanda btn-sm mt-auto">Ver Detalhes</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCategoria{{ $categoria->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselCategoria{{ $categoria->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
                </button>
            </div>
        </section>
    @endif
@endforeach


    {{-- Produtos em Tabela --}}
    <section class="mb-5">
        <h2 class="text-umbanda mb-4 section-title">Tabela de Produtos</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle rounded-3 shadow">
                <thead class="bg-umbanda text-white">
                    <tr>
                        <th>Produto</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>
                                <a href="{{ route('produtos.show', $produto->id) }}" class="text-decoration-none text-dark fw-bold">
                                    {{ $produto->nome }}
                                </a>
                            </td>
                            <td>{{ Str::limit($produto->descricao, 50) }}</td>
                            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td>{{ $produto->categoria->nome ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm text-white" style="background-color: #28a745;">✏</a>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir {{ $produto->nome }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">🗑</button>
                                </form>
                                <form action="{{ route('carrinho.adicionar', $produto->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm text-dark" style="background-color: #FFD700; font-weight:bold;">➕</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($produtos->isEmpty())
                        <tr><td colspan="5" class="text-center">Nenhum produto cadastrado.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
