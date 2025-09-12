@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="hero text-center text-light mb-5" style="background-color:#2c2c3e; padding:60px 0; border-radius:10px;">
    <h1 style="color:#7d5fff;">Altar Oculto</h1>
    <p class="lead" style="color:#f0f0f5;">
        Explore entidades da Umbanda, produtos místicos e encomende imagens de santos personalizadas.
    </p>
</div>

<h3 class="text-center" style="color:#7d5fff; margin-top:40px;">Categorias Populares</h3>
<div id="categoriasCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($categorias->chunk(3) as $chunkIndex => $chunk)
            <div class="carousel-item @if($chunkIndex==0) active @endif">
                <div class="d-flex justify-content-center">
                    @foreach($chunk as $categoria)
                    <div class="card bg-light text-dark border-purple mx-2" style="width: 15rem; cursor:pointer;" onclick="alert('Categoria: {{ $categoria->nome }}')">
                        <img src="{{ $categoria->imagem ?? 'https://via.placeholder.com/300x200.png?text='.$categoria->nome }}" class="card-img-top" alt="{{ $categoria->nome }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $categoria->nome }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#categoriasCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#categoriasCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<h3 class="text-center" style="color:#7d5fff;">Produtos Populares</h3>
<div id="produtosCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($produtos->chunk(3) as $chunkIndex => $chunk)
            <div class="carousel-item @if($chunkIndex==0) active @endif">
                <div class="d-flex justify-content-center">
                    @foreach($chunk as $produto)
                    <div class="card bg-light text-dark border-purple mx-2" style="width: 15rem; cursor:pointer;" onclick="alert('Produto: {{ $produto->nome }} - R$ {{ number_format($produto->preco,2,",",".") }}')">
                        <img src="{{ $produto->imagem ?? 'https://via.placeholder.com/300x200.png?text='.$produto->nome }}" class="card-img-top" alt="{{ $produto->nome }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <p class="card-text">R$ {{ number_format($produto->preco,2,",",".") }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#produtosCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#produtosCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@endsection
