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

    {{-- Produtos Normais (Macumba) --}}
    <section class="mb-5">
        <h2 class="text-umbanda mb-4 section-title">Macumba</h2>
        <div class="row g-4">
            @foreach($produtos->whereNotIn('categoria.linha', ['ervas', 'pedras']) as $produto)
                <div class="col-md-4 col-lg-3">
                    @include('produtos.partials.card', ['produto' => $produto])
                </div>
            @endforeach
            @if($produtos->whereNotIn('categoria.linha', ['ervas', 'pedras'])->isEmpty())
                <p class="text-center w-100">Nenhum produto cadastrado.</p>
            @endif
        </div>
    </section>

    {{-- Ervas --}}
    <section class="mb-5">
        <h2 class="text-umbanda mb-4 section-title">Ervas</h2>
        <div class="row g-4">
            @foreach($produtos->where('categoria.linha', 'ervas') as $produto)
                <div class="col-md-4 col-lg-3">
                    @include('produtos.partials.card', ['produto' => $produto])
                </div>
            @endforeach
            @if($produtos->where('categoria.linha', 'ervas')->isEmpty())
                <p class="text-center w-100">Nenhuma erva cadastrada.</p>
            @endif
        </div>
    </section>

    {{-- Pedras e Cristais --}}
    <section class="mb-5">
        <h2 class="text-umbanda mb-4 section-title">Pedras e Cristais</h2>
        <div class="row g-4">
            @foreach($produtos->where('categoria.linha', 'pedras') as $produto)
                <div class="col-md-4 col-lg-3">
                    @include('produtos.partials.card', ['produto' => $produto])
                </div>
            @endforeach
            @if($produtos->where('categoria.linha', 'pedras')->isEmpty())
                <p class="text-center w-100">Nenhuma pedra cadastrada.</p>
            @endif
        </div>
    </section>
</div>
@endsection
