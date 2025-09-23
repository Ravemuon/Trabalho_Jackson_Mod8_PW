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

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

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

        {{-- Orixás --}}
        <div class="tab-pane fade show active" id="orixas" role="tabpanel" aria-labelledby="orixas-tab">
            @if($orixas->isEmpty())
                <p class="text-center text-umbanda">Nenhum Orixá cadastrado.</p>
            @else
                <div id="carouselOrixas" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($orixas->chunk(4) as $chunkIndex => $chunk)
                            <div class="carousel-item @if($chunkIndex == 0) active @endif">
                                <div class="row justify-content-center">
                                    @foreach($chunk as $categoria)
                                        <div class="col-6 col-md-3 mb-4">
                                            <div class="card card-umbanda h-100 shadow rounded-4 overflow-hidden">
                                                @if($categoria->imagem)
                                                    <img src="{{ $categoria->imagem }}" class="card-img-top" alt="{{ $categoria->nome }}" style="height:220px; object-fit:cover;">
                                                @else
                                                    <div class="bg-light d-flex align-items-center justify-content-center" style="height:220px;">
                                                        <span class="text-muted">Sem imagem</span>
                                                    </div>
                                                @endif
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title text-umbanda fw-bold text-center">{{ $categoria->nome }}</h5>
                                                    <p class="card-text small text-muted text-center">{{ $categoria->descricao ?? 'Sem descrição' }}</p>
                                                    <div class="mt-auto d-flex justify-content-center gap-2 flex-wrap">
                                                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-sm btn-info">Ver</a>
                                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir {{ $categoria->nome }}?')">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselOrixas" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselOrixas" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
                    </button>
                </div>
            @endif
        </div>

        {{-- Linhas --}}
        <div class="tab-pane fade" id="linhas" role="tabpanel" aria-labelledby="linhas-tab">
            @if($linhas->isEmpty())
                <p class="text-center text-umbanda">Nenhuma Linha cadastrada.</p>
            @else
                <div id="carouselLinhas" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($linhas->chunk(4) as $chunkIndex => $chunk)
                            <div class="carousel-item @if($chunkIndex == 0) active @endif">
                                <div class="row justify-content-center">
                                    @foreach($chunk as $categoria)
                                        <div class="col-6 col-md-3 mb-4">
                                            <div class="card card-umbanda h-100 shadow rounded-4 overflow-hidden">
                                                @if($categoria->imagem)
                                                    <img src="{{ $categoria->imagem }}" class="card-img-top" alt="{{ $categoria->nome }}" style="height:220px; object-fit:cover;">
                                                @else
                                                    <div class="bg-light d-flex align-items-center justify-content-center" style="height:220px;">
                                                        <span class="text-muted">Sem imagem</span>
                                                    </div>
                                                @endif
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title text-umbanda fw-bold text-center">{{ $categoria->nome }}</h5>
                                                    <p class="card-text small text-muted text-center">{{ $categoria->descricao ?? 'Sem descrição' }}</p>
                                                    <div class="mt-auto d-flex justify-content-center gap-2 flex-wrap">
                                                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-sm btn-info">Ver</a>
                                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir {{ $categoria->nome }}?')">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselLinhas" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselLinhas" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
                    </button>
                </div>
            @endif
        </div>

        {{-- Itens --}}
        <div class="tab-pane fade" id="itens" role="tabpanel" aria-labelledby="itens-tab">
            @if($itens->isEmpty())
                <p class="text-center text-umbanda">Nenhum Item cadastrado.</p>
            @else
                <div id="carouselItens" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($itens->chunk(4) as $chunkIndex => $chunk)
                            <div class="carousel-item @if($chunkIndex == 0) active @endif">
                                <div class="row justify-content-center">
                                    @foreach($chunk as $categoria)
                                        <div class="col-6 col-md-3 mb-4">
                                            <div class="card card-umbanda h-100 shadow rounded-4 overflow-hidden">
                                                @if($categoria->imagem)
                                                    <img src="{{ $categoria->imagem }}" class="card-img-top" alt="{{ $categoria->nome }}" style="height:220px; object-fit:cover;">
                                                @else
                                                    <div class="bg-light d-flex align-items-center justify-content-center" style="height:220px;">
                                                        <span class="text-muted">Sem imagem</span>
                                                    </div>
                                                @endif
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title text-umbanda fw-bold text-center">{{ $categoria->nome }}</h5>
                                                    <p class="card-text small text-muted text-center">{{ $categoria->descricao ?? 'Sem descrição' }}</p>
                                                    <div class="mt-auto d-flex justify-content-center gap-2 flex-wrap">
                                                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-sm btn-info">Ver</a>
                                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir {{ $categoria->nome }}?')">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselItens" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselItens" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
                    </button>
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
