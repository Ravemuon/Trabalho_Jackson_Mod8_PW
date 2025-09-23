@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Categorias Recentes -->
<section class="mb-5">
    <h2 class="text-umbanda mb-4 section-title">Categorias</h2>
    <div class="d-flex flex-wrap gap-3 justify-content-center">
        @foreach($categorias as $categoria)
            <a href="{{ route('produtos.index') }}?categoria={{ $categoria->id }}"
               class="btn btn-outline-umbanda fw-bold px-4 py-2 text-nowrap">
                {{ $categoria->nome }}
            </a>
        @endforeach
    </div>
</section>

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

@endsection
