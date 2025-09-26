@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<div class="container">
    <h1 class="mb-4 text-umbanda text-center">Linhas e Divindades da Umbanda</h1>

    {{-- Botões: Adicionar e Pesquisar --}}
    <div class="d-flex justify-content-center mb-4 gap-3 flex-wrap">
        <a href="{{ route('categorias.create') }}" class="btn btn-umbanda btn-lg shadow">+ Nova Categoria</a>

        <form action="{{ route('categorias.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar categoria..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-umbanda ms-2">Pesquisar</button>
        </form>
    </div>

    @php
        $orixas = $categorias->where('linha', 'orixa')->values();
        $linhas = $categorias->where('linha', 'linha')->values();
        $itens  = $categorias->whereNotIn('linha', ['orixa','linha'])->values();
    @endphp

    {{-- Abas --}}
    <ul class="nav nav-tabs justify-content-center mb-4" id="categoriasTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-bold" id="orixas-tab" data-bs-toggle="tab" data-bs-target="#orixas" type="button" role="tab">Orixás</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="linhas-tab" data-bs-toggle="tab" data-bs-target="#linhas" type="button" role="tab">Linhas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="itens-tab" data-bs-toggle="tab" data-bs-target="#itens" type="button" role="tab">Itens</button>
        </li>
    </ul>

    <div class="tab-content" id="categoriasTabsContent">

        @foreach(['orixas' => $orixas, 'linhas' => $linhas, 'itens' => $itens] as $tipo => $colecao)
            <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $tipo }}" role="tabpanel">
                @if($colecao->isEmpty())
                    <p class="text-center text-umbanda">Nenhum registro cadastrado.</p>
                @else
                    <div class="row g-4 justify-content-center">
                        @foreach($colecao as $categoria)
                            <div class="col-6 col-md-3 mb-4">
                                <div class="card card-umbanda h-100 shadow rounded-4 overflow-hidden hover-shadow">
                                    {{-- Card clicável para mostrar detalhes --}}
                                    <a href="{{ route('categorias.show', $categoria->id) }}" class="text-decoration-none text-black">
                                        @if($categoria->imagem)
                                            <img src="{{ $categoria->imagem }}" class="card-img-top" alt="{{ $categoria->nome }}" style="height:320px; object-fit:cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:320px;">
                                                <span class="text-muted">Sem imagem</span>
                                            </div>
                                        @endif
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-umbanda fw-bold text-center">{{ $categoria->nome }}</h5>
                                            <p class="card-text small text-muted text-center">{{ $categoria->descricao ?? 'Sem descrição' }}</p>
                                        </div>
                                    </a>
                                    {{-- Botões dentro do card --}}
                                    <div class="card-footer d-flex justify-content-center gap-2 flex-wrap bg-white border-0">
                                        <a href="{{ route('produtos.index') }}?categoria={{ $categoria->id }}" class="btn btn-sm btn-info">Produtos</a>
                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-success" title="Editar">✏</a>
                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir {{ $categoria->nome }}?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Excluir">🗑</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach

    </div>
</div>
@endsection
