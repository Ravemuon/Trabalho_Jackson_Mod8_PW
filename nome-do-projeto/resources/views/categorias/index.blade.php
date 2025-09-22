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

    {{-- Agrupando categorias por linha --}}
    @php
        $linhas = $categorias->groupBy('linha');
    @endphp

    @forelse($linhas as $linha => $cats)
        <div class="mb-5">
            <h2 class="text-umbanda mb-3 border-bottom border-secondary pb-2">
                {{ ucfirst($linha) }}
            </h2>

            <div class="row">
                @foreach($cats as $categoria)
                    <div class="col-md-4 mb-4">
                        <div class="card card-umbanda h-100 shadow-lg rounded-4 overflow-hidden">

                        {{-- Imagem da categoria --}}
                        @if($categoria->imagem)
                            <img src="{{ $categoria->imagem }}"
                                class="card-img-top"
                                alt="{{ $categoria->nome }}"
                                style="height: 450px; object-fit: cover; border-bottom: 3px solid #6b3fa0;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 450px;">
                                <span class="text-muted">Sem imagem</span>
                            </div>
                        @endif


                            {{-- Conteúdo do card --}}
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title text-umbanda fw-bold text-center">{{ $categoria->nome }}</h4>
                                <p class="card-text text-muted small">
                                    <strong>Descrição:</strong> {{ $categoria->descricao ?? 'Sem descrição' }}
                                </p>

                                {{-- Botões de ação --}}
                                <div class="mt-auto d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-sm btn-info">Ver</a>
                                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ route('categorias.destroy', $categoria->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Deseja realmente excluir {{ $categoria->nome }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p class="text-center text-umbanda">Nenhuma categoria cadastrada.</p>
    @endforelse
</div>
@endsection
