@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Carrossel de Categorias -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">Categorias Recentes</h2>
    <div id="carouselCategorias" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($categorias->chunk(3) as $chunkIndex => $chunk)
                <div class="carousel-item @if($chunkIndex==0) active @endif">
                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        @foreach($chunk as $categoria)
                            <div class="card card-umbanda text-center" style="width: 18rem;">
                                <img src="{{ $categoria->imagem ?? 'https://via.placeholder.com/300x200.png?text='.$categoria->nome }}"
                                     class="card-img-top" alt="{{ $categoria->nome }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-umbanda">{{ $categoria->nome }}</h5>
                                    <a href="{{ route('produtos.index') }}?categoria={{ $categoria->id }}"
                                       class="btn btn-umbanda btn-sm mt-auto">Ver Produtos</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCategorias" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCategorias" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
        </button>
    </div>
</section>

<!-- Produtos Normais (excluindo Ervas e Pedras) -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">Produtos</h2>
    <div class="d-flex justify-content-center flex-wrap gap-4">
        @php
            $produtosNormais = $produtos->reject(function($item) {
                return in_array($item->categoria->linha ?? '', ['ervas', 'pedras']);
            });
        @endphp

        @forelse($produtosNormais as $produto)
            <div class="card card-umbanda text-center" style="width: 18rem; height: 320px;">
                <img src="{{ $produto->imagem ?? 'https://via.placeholder.com/300x200.png?text='.$produto->nome }}"
                     class="card-img-top" alt="{{ $produto->nome }}" style="height: 160px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-umbanda">{{ $produto->nome }}</h5>
                    <p class="card-text fw-bold text-umbanda" style="color:#6b3fa0;">R$ {{ number_format($produto->preco,2,",",".") }}</p>
                    <a href="{{ route('produtos.show', $produto) }}" class="btn btn-umbanda btn-sm mt-auto">Ver Detalhes</a>
                </div>
            </div>
        @empty
            <p class="text-center w-100">Nenhum produto disponível.</p>
        @endforelse
    </div>
</section>

<!-- História dos Orixás -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">História dos Orixás</h2>
    <div class="row g-4">
        @foreach($categorias->where('linha','orixa') as $orixa)
            <div class="col-md-4">
                <div class="card card-umbanda h-100 shadow-sm p-3 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-umbanda text-center">{{ $orixa->nome }}</h5>
                        <p class="card-text">{{ Str::limit($orixa->historia, 150) }}</p>
                        @if($orixa->pontos_cantados ?? false)
                            <p class="text-umbanda fw-bold text-center mt-auto">Pontos: {{ $orixa->pontos_cantados }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Área de Ervas -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">Ervas</h2>
    <div class="d-flex justify-content-center flex-wrap gap-3">
        @foreach($categorias->where('linha', 'ervas') as $erva)
            <div class="card card-umbanda text-center" style="width: 14rem;">
                <img src="{{ $erva->imagem }}" class="card-img-top" alt="{{ $erva->nome }}" style="height: 140px; object-fit: cover; border-radius: 6px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-umbanda">{{ $erva->nome }}</h5>
                    <p class="card-text">{{ $erva->descricao }}</p>
                    <a href="{{ route('categorias.show', $erva) }}" class="btn btn-purple mt-auto">Ver Produtos</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Área de Pedras -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">Pedras e Cristais</h2>
    <div class="d-flex justify-content-center flex-wrap gap-3">
        @foreach($categorias->where('linha', 'pedras') as $pedra)
            <div class="card card-umbanda text-center" style="width: 14rem;">
                <img src="{{ $pedra->imagem }}" class="card-img-top" alt="{{ $pedra->nome }}" style="height: 140px; object-fit: cover; border-radius: 6px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-umbanda">{{ $pedra->nome }}</h5>
                    <p class="card-text">{{ $pedra->descricao }}</p>
                    <a href="{{ route('categorias.show', $pedra) }}" class="btn btn-purple mt-auto">Ver Produtos</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
